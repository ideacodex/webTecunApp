<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Status;
use App\Comment;
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
        $post = Post::findOrFail($id);
        
        //$comments = DB::table('comment_post')->where('post_id', $post->id)->get();

        $comments_id = DB::table('comment_post')->select('comment_id')
        ->where('post_id', $post->id)->get();

        $comments = Comment::whereIn('id', $comments_id->pluck("comment_id"))->with('user')->get();

        $category = Category::all();
        $commentsLong = sizeof($comments);

        //Traemos el array con toda la informacion combianda de la BD  
        $categoryName = $post->category;

        return view("posts.show", [
            "post" => $post, 
            'categoryName' => $categoryName, 
            'comments' => $comments,
            'commentsLong' => $commentsLong    
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
        //
        $posts = Post::all();
        return view("home", ["posts" => $posts]);
    }

    public function newsRead(Request $request, $id)
    {
        //
        $post = Post::findorFail($id);
        return $post;
        return view("post.show", ["post" => $post]);
    }
}
