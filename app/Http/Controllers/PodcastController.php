<?php

namespace App\Http\Controllers;

use App\Podcast;
use App\Status;
use App\Category;
use App\CommentPodcast;
use App\ReactionsPodcast;

use DB;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podcast = Podcast::orderBy('created_at', 'desc')->get();
        return view("podcasts.index", ["podcast" => $podcast]);
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
        
        return view("podcasts.create", ["status" => $status, "categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);

        request()->validate([
            '_token' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        DB::beginTransaction();
        try {

            //encontrar y asignar rol de Spatie
            $podcast = new Podcast;
            $podcast->title = $request->title;
            $podcast->description = $request->description;
            $podcast->content = $request->editordata;
            $podcast->user_id = auth()->user()->id;
            $podcast->status_id = 1;
            $podcast->iframe = $request->iframe;
            $podcast->save();

            //Modificar la ruta del video YouTube
            $video = $request->video;

            if($video && !is_null($video)){
                $routeVideo = "https://www.youtube.com/embed/".$video;
                $podcast->featured_video = $routeVideo;
            }
            //Modificar la ruta del video YouTube   
            
            //Modificar la ruta del Spotify 
            $spotify = $request->spotify;

            if($spotify && !is_null($spotify)){
                $routeSpotify = "https://open.spotify.com/embed-podcast/episode/".$spotify;
                $podcast->featured_spotify = $routeSpotify;
            }

            for ($i=0; $i < sizeof($request->category_id); $i++) { 
                $request->category_id[$i];
                DB::table('category_podcast')->insert(
                    ['category_id' => $request->category_id[$i], 'podcast_id' => $podcast->id]
                );
            }

            //******carga de imagen**********//
            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageNameToStore = '100090080'.$podcast->id . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('image')->storeAs('public/podcast', $imageNameToStore);
                //dd($path);

                $podcast->featured_image = $imageNameToStore;
            
            }
            //******carga de imagen**********//

            //******carga de audio**********//
            if ($request->hasFile('audio')) {
                $extension = $request->file('audio')->getClientOriginalExtension();
                $audioNameToStore = '100090057'.$podcast->id . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('audio')->storeAs('public/podcast', $audioNameToStore);
                //dd($path);

                $podcast->featured_audio = $audioNameToStore;
             }
            //******carga de audio**********//

            //******carga de file**********//
            if ($request->hasFile('pdf')) {
                $extension = $request->file('pdf')->getClientOriginalExtension();
                $pdfNameToStore = '100090043'.$podcast->id . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('pdf')->storeAs('public/podcast', $pdfNameToStore);
                //dd($path);
                $podcast->featured_document = $pdfNameToStore;
            } 
            //******carga de file**********//
            //dd($podcast);
            $podcast->save();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->action('PodcastController@create')
                    ->with(['message' => 'Error al crear del Podcast', 'alert' => 'warning']);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'PodcastController@index')->with(['message' => 'Se agreg?? el registro correctamente', 'alert' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $podcast = Podcast::with('user')->findOrFail($id);
        $comments= CommentPodcast::where('podcast_id', $podcast->id)->with('user')->get();

        //Traemos el array con toda la informacion combianda de la BD  
        $categoryName = $podcast->category;

        return view("podcasts.show", [
            "podcast" => $podcast, 
            'categoryName' => $categoryName,
            'comments'=>$comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $podcast = Podcast::findOrFail($id);
        $status = Status::all();
        $categories = Category::all();

        //Remplazamos la Url de Youtube y dejamos solo el codigo
        $stringUrlYoutube = $podcast->featured_video;

        if($stringUrlYoutube && !is_null($stringUrlYoutube)){
            $codeYoutube = str_replace("https://www.youtube.com/embed/", "", $stringUrlYoutube);
        }else{
            $codeYoutube = null;
        }
        //Remplazamos la Url de Youtube y dejamos solo el codigo

        //Remplazamos la Url de Spotify y dejamos solo el codigo
        $stringUrlSpotify = $podcast->featured_spotify;

        if($stringUrlSpotify && !is_null($stringUrlSpotify)){
            $codeSpotify = str_replace("https://open.spotify.com/embed-podcast/episode/", "", $stringUrlSpotify);
        }else{
            $codeSpotify = null;
        }
        //Remplazamos la Url de Spotify y dejamos solo el codigo

        //Traemos el array con toda la informacion combianda de la BD  
        $categoryName = $podcast->category;

        return view("podcasts.edit", [
            "status" => $status, 
            "categories" => $categories, 
            "podcast" => $podcast,
            "categoryName" => $categoryName,
            'codeYoutube' => $codeYoutube,
            'codeSpotify' => $codeSpotify
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //dd($request);

        request()->validate([
            '_token' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        DB::beginTransaction();
        try {

            //encontrar y asignar rol de Spatie
            $podcast = Podcast::find($id);
            $podcast->title = $request->title;
            $podcast->description = $request->description;
            $podcast->content = $request->editordata;
            $podcast->iframe = $request->iframe;
            //Modificar la ruta del video YouTube
            $video = $request->video;
            $podcast->save();

            if($video && !is_null($video)){
                $routeVideo = "https://www.youtube.com/embed/".$video;

                $podcast->featured_video = $routeVideo;
            }

             
            
            //Modificar la ruta del Spotify 
            $spotify = $request->spotify;

            if($spotify && !is_null($spotify)){
                $routeSpotify = "https://open.spotify.com/embed-podcast/episode/".$spotify;

                $podcast->featured_spotify = $routeSpotify;
            }
            //Modificar la ruta del Spotify    

            

            //Todos los registros de categoria id son llamados
            $category = Category::find($id);

            //Traemos el array con toda la informacion combianda de la BD  
            $categoryName = $podcast->category;
            
            //Buscamos los items de category_post relacionados con un solo post
            $podcastDB = DB::table('category_podcast')->where('podcast_id', $podcast->id)->get();
            
            if(sizeof($request->category_id) >= sizeof($podcastDB)){
                DB::table('category_podcast')->where('podcast_id', $podcast->id)->delete();


                for ($i=0; $i < sizeof($request->category_id); $i++) { 
                    $request->category_id[$i];
                    DB::table('category_podcast')->insert(
                        ['category_id' => $request->category_id[$i], 'podcast_id' => $podcast->id]
                    );
                }
            }else{
                DB::table('category_podcast')->where('podcast_id', $podcast->id)->delete();

                for ($i=0; $i < sizeof($request->category_id); $i++) { 
                    $request->category_id[$i];
                    DB::table('category_podcast')->insert(
                        ['category_id' => $request->category_id[$i], 'podcast_id' => $podcast->id]
                    );
                }                    
            }

            //******carga de imagen**********//
            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageNameToStore = '100090010'.$podcast->id . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('image')->storeAs('public/podcast', $imageNameToStore);
                //dd($path);

                $podcast->featured_image = $imageNameToStore;

            }
            //******carga de imagen**********//

            //******carga de audio**********//
            if ($request->hasFile('audio')) {
                $extension = $request->file('audio')->getClientOriginalExtension();
                $audioNameToStore = '100090080'.$podcast->id . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('audio')->storeAs('public/podcast', $audioNameToStore);
                //dd($path);

                $podcast->featured_audio = $audioNameToStore;
            }
            //******carga de audio**********//

            //******carga de file**********//
            if ($request->hasFile('pdf')) {
                $extension = $request->file('pdf')->getClientOriginalExtension();
                $pdfNameToStore = '100090037'.$podcast->id . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('pdf')->storeAs('public/podcast', $pdfNameToStore);
                //dd($path);

                $podcast->featured_document = $pdfNameToStore;
            }
            //******carga de file**********//
            //dd($podcast);
            $podcast->save();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array est?? el mensaje
            return response()->json($response, 500);
            return redirect()->action('PodcastController@edit')
                    ->with(['message' => 'Error al crear el Podcast', 'alert' => 'warning']);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'PodcastController@index')->with(['message' => 'Se actualizo el registro correctamente', 'alert' => 'warning']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::beginTransaction();
        try
        {

            $podcast = Podcast::find($id);
            DB::table('category_podcast')->where('podcast_id', $podcast->id)->delete();
            DB::table('commentpodcast')->where('podcast_id', $podcast->id)->delete();
            DB::table('reactionpodcast')->where('podcast_id', $podcast->id)->delete();

            Storage::disk('podcast')->delete($podcast->featured_image);
            Storage::disk('podcast')->delete($podcast->featured_audio);
            Storage::disk('podcast')->delete($podcast->featured_document);
            $podcast->delete();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array est?? el mensaje
                return response()->json($response, 500);
        }
        DB::commit();

        return redirect()->action('PodcastController@index')
                    ->with(['message' => 'Se elimino el registro correctamente', 'alert' => 'danger']);
    }

    public function podcasts()
    {
        //Mostramos todos los POSTS creados y junto a ello los likes de cada uno
        $podcasts = Podcast::with('likes')->orderBy('created_at', 'desc')->get();//El estado es activo
        
        //De la tabla pivote, sacamos solo los category_id
        $category_id = DB::table('category_podcast')->get('category_id');

        //Decodificamos el array con json_decode
        $categoryID = json_decode($category_id, true);

        //La variable anterior la utilizamos para sacar solo las categorias con esos ID's
        $categories = Category::find($categoryID);

        return view("podcasts.podcast", [
            "podcasts" => $podcasts,
            'categories' => $categories 
        ]);
    }

    public function podcastRead($id)
    {
        $podcast = Podcast::with('user')->findOrFail($id);
        $comments= CommentPodcast::where('podcast_id', $podcast->id)->with('user')->get();

        //Traemos el array con toda la informacion combianda de la BD  
        $categoryName = $podcast->category;

        return view("podcast.show", [
            "podcast" => $podcast, 
            'categoryName' => $categoryName,
            'comments'=>$comments
        ]);
    }

    public function commentPodcast(Request $request)
    {
        $userId = auth()->user()->id;

        request()->validate([
            'message' => 'required'
        ]);

        DB::beginTransaction();

        try{
            $comment = DB::table('commentpodcast')->insert([
                'user_id' => $userId,
                'podcast_id' => $request->podcastID,
                'message' => $request->message
            ]);

        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array est?? el mensaje
            return response()->json($response, 500);
            return \Redirect::back()->with([
                'message' => 'No haz publicado tu comentario, vuelve a intentar',
                'alert' => 'danger'
            ]);
        }

        DB::commit();

        return \Redirect::back()->with([
            'message' => 'Haz publicado tu comentario correctamente',
            'alert' => 'success'
        ]);
    }

    public function deleteCommentPodcast($id)
    {
        //Conseguimos el ID del usuario
        $user = auth()->user()->id;

        //Conseguimos el objeto del comentario
        $comment = CommentPodcast::find($id);

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

    public function likeOrDislikePodcast(Request $request)
    {
        //Recogemos los datos del usuario
        $user = auth()->user()->id;

        //Buscamos el ID de la Categoria si existe
        $categoryID = $request->categoryId;

        //Recogemos el reactionActive
        $reactionActive = $request->reactionActive;
        $podcastID = $request->podcastID;

        //Verificar que existe el like del usuario
        $issetReactionUser = DB::table('reactionpodcast')
                ->where('user_id', $user)
                ->where('podcast_id', $podcastID)
                ->count();

        DB::beginTransaction();

        try{
            if($issetReactionUser == 0){
                $like = DB::table('reactionpodcast')->insert([
                    'user_id' => $user,
                    'podcast_id' => $request->podcastID,
                    'active' => 1
                ]);

                DB::commit();
    
                return \Redirect::back()->with([
                    'message' => 'Tu reaccion a sido publicada correctamente', 
                    'alert' => 'success'
                ]);
    
            }else{
                if($reactionActive == 0){
                    DB::table('reactionpodcast')->where('user_id', $user)
                        ->where('podcast_id', $podcastID)->update(['active' => 1]);

                    DB::commit();

                    return \Redirect::back()->with([
                        'message' => 'Tu reaccion a sido publicada correctamente', 
                        'alert' => 'success'
                    ]);
                }else{
                    DB::table('reactionpodcast')->where('user_id', $user)
                        ->where('podcast_id', $podcastID)->update(['active' => 0]);

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
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array est?? el mensaje
                return response()->json($response, 500);
        }
    }

    public function categoryPodcast($id)
    {
        //Obtenemos todo el objeto de la categoria por medio del ID
        $categoryPodcast = Category::find($id);

        //Sacamos solo el nombre de la categoria para mostrarla en un alert
        $categoryPodcastName = $categoryPodcast->name;

        //En la tabla pivote, obtenemos el/los ID de los post que hace referencia a la categoria
        $podcastID = DB::table('category_podcast')->where('category_id', $id)->get('podcast_id');

        //Decodificamos los datos anteriores para tener una mejor manipulacion y obtener el/los ID del podcast
        $podcastDecode = json_decode($podcastID, true);

        //Al obtener el valor decodificado lo mandamos a llamar con un find para sacar el/los objecto completo
        $podcasts = Podcast::find($podcastDecode);

        /******************************************************************************************************** */

        //De la tabla pivote, sacamos solo los category_id
        $category_id = DB::table('category_podcast')->get('category_id');

        //Decodificamos el array con json_decode
        $categoryID = json_decode($category_id, true);

        //La variable anterior la utilizamos para sacar solo las categorias con esos ID's
        $categories = Category::find($categoryID);

        return view("podcasts.podcastOfCategory", [
            "podcasts" => $podcasts,
            'categories' => $categories,
            'categoryPodcastName' => $categoryPodcastName
        ]);
    }
}
