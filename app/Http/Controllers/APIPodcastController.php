<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Category;
use App\Podcast;
use App\Status;
use App\CommentPodcast;
use App\ReactionPodcast;

use DB;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class APIPodcastController extends Controller
{
    public function getImage($featured_image)
    {
        $isset = \Storage::disk('podcast')->exists($featured_image);

        if($isset){
            $file = \Storage::disk('podcast')->get($featured_image);

            return new response($file, 200);
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'La imagen no existe'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function getDocument($featured_document)
    {
        $isset = \Storage::disk('podcast')->exists($featured_document);

        if($isset){
            $file = \Storage::disk('podcast')->get($featured_document);

            return new response($file, 200);
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'No existe el documento'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function podcasts()
    {
        //Mostramos todos los POSTS creados y junto a ello los likes de cada uno
        $podcasts = Podcast::with('likes')->with('comments.user')->get();//El estado es activo
        
        //De la tabla pivote, sacamos solo los category_id
        $category_id = DB::table('category_podcast')->get('category_id');

        //Decodificamos el array con json_decode
        $categoryID = json_decode($category_id, true);

        //La variable anterior la utilizamos para sacar solo las categorias con esos ID's
        $categories = Category::find($categoryID);

        if(isset($categories) && isset($podcasts)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'podcasts' => $podcasts,
                'categories' => $categories
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'Sin datos por mostrar'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function podcastRead($id)
    {
        //
        $podcast = Podcast::with('comments.user')->findOrFail($id);
        $comments= CommentPodcast::where('podcast_id', $podcast->id)->with('user')->get();

        //Traemos el array con toda la informacion combianda de la BD  
        $categoryName = $podcast->category;

        if(isset($podcast)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'podcast' => $podcast,
                'comments' => $comments,
                //'categoryName' => $categoryName
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'No se encuentra la noticia'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function commentPodcast(Request $request)
    {
        //Recoger los datos por post
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        if(!empty($params_array)){
            //Conseguir el ID del usuario identificado
            $userId = auth()->user()->id;

            //Verificar los datos recibidos
            $validate = \Validator::make($params_array, [
                'message' => 'required'
            ]);

            if($validate->fails()){
                $data = [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Faltan datos'
                ];
            }else{

                DB::beginTransaction();

                try{
                    $comment = DB::table('commentpodcast')->insert([
                        'user_id' => $userId,
                        'podcast_id' => $params_array['podcast_id'],
                        'message' => $params->message
                    ]);

                }catch (\Illuminate\Database\QueryException $e) {
                    DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                    //$response['message'] = $e->errorInfo;
                    //dd($e->errorInfo[2]);
                    abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                    return response()->json($response, 500);
                }

                DB::commit();

                $data = [
                    'code' => '200',
                    'status' => 'success',
                    'comment' => $comment
                ];
            }
        }else{
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Error en publicar tu comentario'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function delete(Request $request)
    {
        //Recoger los datos por post
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        //Conseguimos el ID del usuario
        $user = auth()->user()->id;

        //Conseguimos el objeto del comentario
        $comment = CommentPodcast::find($params->id);

        //Comprobar si ID del usuario es el mismo que el user_id de Comments_post
        if(isset($user) && ($comment->user_id == $user)){
            $comment->delete();

            $data = [
                'code' => 200,
                'status' => 'success',
                'message' => 'Commentario eliminado'
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'No se encontro el comentario'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function likeOrDislikePodcast(Request $request)
    {
        //Recoger los datos por post
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        if(!empty($params_array)){
            //Recogemos los datos del usuario
            $user = auth()->user()->id;

            //Recogemos el reactionActive
            $reactionActive = $params->reactionActive;
            $podcastID = $params->podcastID;

            //Verificar que existe el like del usuario
            $issetReactionUser = DB::table('reactionpodcast')->where('user_id', $user)
                                ->where('podcast_id', $podcastID)
                                ->count();

            DB::beginTransaction();

            try{
                if($issetReactionUser == 0){
                    $like = DB::table('reactionpodcast')->insert([
                        'user_id' => $user,
                        'podcast_id' => $podcastID,
                        'active' => 1
                    ]);

                    DB::commit();

                    $data = [
                        'code' => 200,
                        'status' => 'success',
                        'message' => 'Haz publicado tu reaccion correctamente'
                    ];
        
                }else{
                    if($reactionActive == 0){
                        DB::table('reactionpodcast')->where('user_id', $user)
                            ->where('podcast_id', $podcastID)->update(['active' => 1]);

                        DB::commit();

                        $data = [
                            'code' => 200,
                            'status' => 'success',
                            'message' => 'Haz publicado tu reaccion correctamente'
                        ];
                    }else{
                        DB::table('reactionpodcast')->where('user_id', $user)
                            ->where('podcast_id', $podcastID)->update(['active' => 0]);

                        DB::commit();
                        
                        $data = [
                            'code' => 200,
                            'status' => 'success',
                            'message' => 'Haz quitado tu reaccion correctamente'
                        ];
                    }
                }
            }catch (\Illuminate\Database\QueryException $e) {
                DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                    //$response['message'] = $e->errorInfo;
                    //dd($e->errorInfo[2]);
                    abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                    return response()->json($response, 500);
            }
        }else{
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Error al reacccionar a la noticia'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function categoryPodcast($id)
    {
        //Obtenemos todo el objeto de la categoria por medio del ID
        $categoryPodcast = Category::find($id);

        //Sacamos solo el nombre de la categoria para mostrarla en un alert
        $categoryPostName = $categoryPodcast->name;
        $idCategory = $id;

        //En la tabla pivote, obtenemos el/los ID de los post que hace referencia a la categoria
        $podcastID = DB::table('category_podcast')->where('category_id', $id)->get('podcast_id');

        //Decodificamos los datos anteriores para tener una mejor manipulacion y obtener el/los ID del podcast
        $podcastDecode = json_decode($podcastID, true);
        $podcastObject = json_decode($podcastID, true);

        //Al obtener el valor decodificado lo mandamos a llamar con un find para sacar el/los objecto completo
        $podcastArray = Podcast::with('likes')->with('comments.user')->where('id', $podcastDecode)->get();
        $podcast = json_decode($podcastArray);

        /******************************************************************************************************** */

        //De la tabla pivote, sacamos solo los category_id
        $category_id = DB::table('category_podcast')->get('category_id');

        //Decodificamos el array con json_decode
        $categoryID = json_decode($category_id, true);

        //La variable anterior la utilizamos para sacar solo las categorias con esos ID's
        $categories = Category::find($categoryID);

        if(!empty($categoryPodcast) && !empty($podcast) && !empty($categories)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'podcast' => $podcast,
                'categories' => $categories,
                //'categoryPodcastName' => $categoryPostName
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'Sin datos para mostrar'
            ];
        }

        return response()->json($data, $data['code']);
    }
}
