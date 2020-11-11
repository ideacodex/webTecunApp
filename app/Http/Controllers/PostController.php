<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Status;
use App\CommentPost;
use App\ReactionsPost;

use DB;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view("posts.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $status = Status::all();
        $categories = Category::all();
        
        return view("posts.create", ["status" => $status, "categories" => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request['article-trixFields']['content']);

        //dd($request);

        request()->validate([
            '_token' => 'required',
            'title' => 'required',
            'editordata' => 'required',
            'description' => 'required'
        ]);

        DB::beginTransaction();
        try {

            //encontrar y asignar rol de Spatie
            $post = new Post;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->content = $request->editordata;
            //$post->featured_document = $request->featured_document;
            //$post->save();
            $post->user_id = auth()->user()->id;
            $post->status_id = $request->status_id;
            $post->save();

            for ($i=0; $i < sizeof($request->category_id); $i++) { 
                $request->category_id[$i];
                DB::table('category_post')->insert(
                    ['category_id' => $request->category_id[$i], 'post_id' => $post->id]
                );
            }

            //******carga de imagen**********//
            if ($request->hasFile('image')) {
                $filename = $request->_token;
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageNameToStore = $request->_token . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('image')->storeAs('public/posts', $imageNameToStore);
                //dd($path);

                $post->featured_image = $imageNameToStore;
                $post->save();

            } else {
                $imageNameToStore = 'no_image.jpg';
            }
            //******carga de imagen**********//

            //******carga de video**********//
            if ($request->hasFile('video')) {
                $filename = $request->_token;
                $extension = $request->file('video')->getClientOriginalExtension();
                $videoNameToStore = $request->_token . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('video')->storeAs('public/posts', $videoNameToStore);
                //dd($path);

                $post->featured_video = $videoNameToStore;
                $post->save();

            } else {
                $videoNameToStore = 'no_video.jpg';
            }
            //******carga de video**********//

            //******carga de file**********//
            if ($request->hasFile('pdf')) {
                $filename = $request->_token;
                $extension = $request->file('pdf')->getClientOriginalExtension();
                $pdfNameToStore = $request->_token . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('pdf')->storeAs('public/posts', $pdfNameToStore);
                //dd($path);

                $post->featured_document = $pdfNameToStore;
                $post->save();

            } else {
                $pdfNameToStore = 'nofile';
            }
            //******carga de file**********//
            

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
            return redirect()->action('PostController@create')
                    ->with(['message' => 'Error al crear la noticia', 'alert' => 'warning']);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'PostController@index')->with(['message' => 'Se agregó el registro correctamente', 'alert' => 'warning']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::with('user')->findOrFail($id);
        $comments= CommentPost::where('post_id', $post->id)->with('user')->get();

        //Traemos el array con toda la informacion combianda de la BD  
        $categoryName = $post->category;

        return view("posts.show", [
            "post" => $post, 
            'categoryName' => $categoryName,
            'comments'=>$comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $status = Status::all();
        $record = Post::findOrFail($id);
        $categories = Category::all();

        //Traemos el array con toda la informacion combianda de la BD  
        $categoryName = $post->category;

        return view("posts.edit", [
            "status" => $status, 
            "categories" => $categories, 
            "record" => $record,
            "categoryName" => $categoryName
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            //dd($request['article-trixFields']['content']);

            request()->validate([
                '_token' => 'required',
                'title' => 'required',
                'editordata' => 'required',
                'description' => 'required'
            ]);

            //dd($request);
            DB::beginTransaction();
            try {

                //encontrar y asignar rol de Spatie
                $post = Post::findOrFail($id);
                $post->title = $request->title;
                $post->description = $request->description;
                $post->content = $request->editordata;
                //$post->featured_document = $request->featured_document;
                //$post->save();
                $post->user_id = auth()->user()->id;
                $post->status_id = $request->status_id;
                $post->save();

                //Todos los registros de categoria id son llamados
                $category = Category::find($id);

                //Traemos el array con toda la informacion combianda de la BD  
                $categoryName = $post->category;
                
                //Buscamos los items de category_post relacionados con un solo post
                $postDB = DB::table('category_post')->where('post_id', $post->id)->get();
                
                if(sizeof($request->category_id) > sizeof($postDB)){
                    DB::table('category_post')->where('post_id', $post->id)->delete();


                    for ($i=0; $i < sizeof($request->category_id); $i++) { 
                        $request->category_id[$i];
                        DB::table('category_post')->insert(
                            ['category_id' => $request->category_id[$i], 'post_id' => $post->id]
                        );
                    }
                }else{
                    DB::table('category_post')->where('post_id', $post->id)->delete();

                    for ($i=0; $i < sizeof($request->category_id); $i++) { 
                        $request->category_id[$i];
                        DB::table('category_post')->insert(
                            ['category_id' => $request->category_id[$i], 'post_id' => $post->id]
                        );
                    }                    
                }

                    //******carga de imagen**********//
                if ($request->hasFile('image')) {
                    $filename = $request->_token;
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $imageNameToStore = $request->_token . '.' . $extension;
                    // Upload Image //********nombre de carpeta para almacenar*****
                    $path = $request->file('image')->storeAs('public/posts', $imageNameToStore);
                    //dd($path);

                    $post->featured_image = $imageNameToStore;
                    $post->save();

                } else {
                    $imageNameToStore = 'no_image.jpg';
                }
                //******carga de imagen**********//
        
                    //******carga de audio**********//
                    if ($request->hasFile('audio')) {
                        $filename = $request->_token;
                        $extension = $request->file('audio')->getClientOriginalExtension();
                        $audioNameToStore = $request->_token . '.' . $extension;
                        // Upload Image //********nombre de carpeta para almacenar*****
                        $path = $request->file('audio')->storeAs('public/posts', $audioNameToStore);
                        //dd($path);
                    } else {
                        $audioNameToStore = 'no_audio.jpg';
                    }
                    //******carga de audio**********//
        
                    //******carga de video**********//
                if ($request->hasFile('video')) {
                    $filename = $request->_token;
                    $extension = $request->file('video')->getClientOriginalExtension();
                    $videoNameToStore = $request->_token . '.' . $extension;
                    // Upload Image //********nombre de carpeta para almacenar*****
                    $path = $request->file('video')->storeAs('public/posts', $videoNameToStore);
                    //dd($path);

                    $post->featured_video = $videoNameToStore;
                    $post->save();

                } else {
                    $videoNameToStore = 'no_video.jpg';
                }
                //******carga de video**********//
        
                    //******carga de file**********//
                if ($request->hasFile('pdf')) {
                    $filename = $request->_token;
                    $extension = $request->file('pdf')->getClientOriginalExtension();
                    $pdfNameToStore = $request->_token . '.' . $extension;
                    // Upload Image //********nombre de carpeta para almacenar*****
                    $path = $request->file('pdf')->storeAs('public/posts', $pdfNameToStore);
                    //dd($path);

                    $post->featured_document = $pdfNameToStore;
                    $post->save();

                } else {
                    $pdfNameToStore = 'nofile';
                }
                //******carga de file**********//

            } catch (\Illuminate\Database\QueryException $e) {
                DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($response, 500);
            }

            DB::commit();
            return redirect()->action( //regresa con el error
                'PostController@index')->with(['message' => 'Se actualizó el registro correctamente', 'alert' => 'warning']);
    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::beginTransaction();
        try
        {

            $post = Post::find($id);
            DB::table('category_post')->where('post_id', $post->id)->delete();
            DB::table('commentposts')->where('post_id', $post->id)->delete();
            DB::table('reactionposts')->where('post_id', $post->id)->delete();

            Storage::disk('posts')->delete($post->featured_image);
            Storage::disk('posts')->delete($post->featured_video);
            Storage::disk('posts')->delete($post->featured_document);
            $post->delete();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($response, 500);
        }
        DB::commit();

        return redirect()->action('PostController@index')
                    ->with(['message' => 'Se elimino el registro correctamente', 'alert' => 'danger']);
    }


    public function news()
    {
        //Mostramos todos los POSTS creados y junto a ello los likes de cada uno
        $posts = Post::with('likes')->get();//El estado es activo
        
        //De la tabla pivote, sacamos solo los category_id
        $category_id = DB::table('category_post')->get('category_id');

        //Decodificamos el array con json_decode
        $categoryID = json_decode($category_id, true);

        //La variable anterior la utilizamos para sacar solo las categorias con esos ID's
        $categories = Category::find($categoryID);

        return view("posts.news", [
            "posts" => $posts,
            'categories' => $categories 
        ]);
    }

    public function newsRead($id)
    {
        //
        $post = Post::with('user')->findOrFail($id);
        $comments= CommentPost::where('post_id', $post->id)->with('user')->get();

        //Traemos el array con toda la informacion combianda de la BD  
        $categoryName = $post->category;

        return view("posts.show", [
            "post" => $post, 
            'categoryName' => $categoryName,
            'comments'=>$comments
        ]);
    }

    public function commentPost(Request $request)
    {
        $userId = auth()->user()->id;

        request()->validate([
            'message' => 'required'
        ]);

        DB::beginTransaction();

        try{
            $comment = DB::table('commentposts')->insert([
                'user_id' => $userId,
                'post_id' => $request->postID,
                'message' => $request->message
            ]);

        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
            return \Redirect::back()->with([
                'message' => 'No haz publicado tu comentario, vuelve a intentar'
            ]);
        }

        DB::commit();

        return \Redirect::back()->with([
            'message' => 'Haz publicado tu comentario correctamente'
        ]);
    }

    public function delete($id)
    {
        //Conseguimos el ID del usuario
        $user = auth()->user()->id;

        //Conseguimos el objeto del comentario
        $comment = CommentPost::find($id);

        //Comprobar si ID del usuario es el mismo que el user_id de Comments_post
        if(isset($user) && ($comment->user_id == $user)){
            $comment->delete();

            return \Redirect::back()->with([
                'message' => 'Tu comentario a sido borrado exitosamente'
            ]);
        }else{
            return \Redirect::back()->with([
                'message' => 'No se a eliminado tu comentario, intente de nuevo'
            ]);  
        }
    }

    public function likeOrDislikeNews(Request $request)
    {
        //Recogemos los datos del usuario
        $user = auth()->user()->id;

        //Recogemos el reactionActive
        $reactionActive = $request->reactionActive;
        $postID = $request->postID;

        //Verificar que existe el like del usuario
        $issetReactionUser = DB::table('reactionposts')->where('user_id', $user)->where('post_id', $postID)->count();

        DB::beginTransaction();

        try{
            if($issetReactionUser == 0){
                $like = DB::table('reactionposts')->insert([
                    'user_id' => $user,
                    'post_id' => $request->postID,
                    'active' => 1
                ]);

                DB::commit();
    
                return \Redirect::back()->with([
                    'message' => 'Tu reaccion a sido publicada correctamente', 
                    'alert' => 'success'
                ]);
    
            }else{
                if($reactionActive == 0){
                    DB::table('reactionposts')->where('user_id', $user)
                        ->where('post_id', $postID)->update(['active' => 1]);

                    DB::commit();

                    return \Redirect::back()->with([
                        'message' => 'Tu reaccion a sido publicada correctamente', 
                        'alert' => 'success'
                    ]);
                }else{
                    DB::table('reactionposts')->where('user_id', $user)
                        ->where('post_id', $postID)->update(['active' => 0]);

                    DB::commit();
                    
                    return \Redirect::back()->with([
                        'message' => 'Tu reaccion a sido quitada correctamente Del Home', 
                        'alert' => 'success'
                    ]);
                }
            }
        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($response, 500);
        }
    }

    public function categoryPost($id)
    {
        //Obtenemos todo el objeto de la categoria por medio del ID
        $categoryPost = Category::find($id);

        //Sacamos solo el nombre de la categoria para mostrarla en un alert
        $categoryPostName = $categoryPost->name;

        //En la tabla pivote, obtenemos el/los ID de los post que hace referencia a la categoria
        $postID = DB::table('category_post')->where('category_id', $id)->get('post_id');

        //Decodificamos los datos anteriores para tener una mejor manipulacion y obtener el/los ID del podcast
        $postDecode = json_decode($postID, true);

        //Al obtener el valor decodificado lo mandamos a llamar con un find para sacar el/los objecto completo
        $posts = Post::find($postDecode);

        /******************************************************************************************************** */

        //De la tabla pivote, sacamos solo los category_id
        $category_id = DB::table('category_post')->get('category_id');

        //Decodificamos el array con json_decode
        $categoryID = json_decode($category_id, true);

        //La variable anterior la utilizamos para sacar solo las categorias con esos ID's
        $categories = Category::find($categoryID);

        return view("posts.postOfCategory", [
            "posts" => $posts,
            'categories' => $categories,
            'categoryPodcastName' => $categoryPostName
        ]);
    }
}

