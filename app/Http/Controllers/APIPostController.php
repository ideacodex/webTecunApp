<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Category;
use App\Post;
use App\Status;
use App\CommentPost;
use App\ReactionsPost;

use DB;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class APIPostController extends Controller
{
    public function getImage($featured_image)
    {
        $isset = \Storage::disk('posts')->exists($featured_image);

        if($isset){
            $file = \Storage::disk('posts')->get($featured_image);

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
        $isset = \Storage::disk('posts')->exists($featured_document);

        if($isset){
            $file = \Storage::disk('posts')->get($featured_document);

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

    public function news()
    {
        //Mostramos todos los POSTS creados y junto a ello los likes de cada uno
        $posts = Post::with('likes')->with('userLikesNew')->with('comments.user')->orderBy('created_at', 'desc')->get();//El estado es activo
        
        //De la tabla pivote, sacamos solo los category_id
        $category_id = DB::table('category_post')->get('category_id');

        //Decodificamos el array con json_decode
        $categoryID = json_decode($category_id, true);

        //La variable anterior la utilizamos para sacar solo las categorias con esos ID's
        $categories = Category::find($categoryID);

        if(isset($categories) && isset($posts)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'posts' => $posts,
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

    public function newsRead($id)
    {
        //
        $post = Post::with('comments.user')->with('likes')->with('likes')->with('userLikesNew')->findOrFail($id);
        $comments= CommentPost::where('post_id', $post->id)->with('user')->get();

        //Traemos el array con toda la informacion combianda de la BD  
        $categoryName = $post->category;

        if(isset($post)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'post' => $post,
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

    public function commentPost(Request $request)
    {
        //Recoger los datos por post
        $json = $request->input('json', null);
        $params = json_decode($json);
        $request = json_decode($json, true);

        if(!empty($request)){
            //Conseguir el ID del usuario identificado
            $userId = auth()->user()->id;

            //Verificar los datos recibidos
            $validate = \Validator::make($request, [
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
                    $comment = DB::table('commentposts')->insert([
                        'user_id' => $userId,
                        'post_id' => $request['post_id'],
                        'message' => $params->message
                    ]);

                }catch (\Illuminate\Database\QueryException $e) {
                    DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                    //$response['message'] = $e->errorInfo;
                    //dd($e->errorInfo[2]);
                    abort(500, $e->errorInfo[2]); //en la poscision 2 del array est?? el mensaje
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
        $request = json_decode($json, true);

        //Conseguimos el ID del usuario
        $user = auth()->user()->id;

        //Conseguimos el objeto del comentario
        $comment = CommentPost::find($params->id);

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

    public function likeOrDislikeNews(Request $request)
    {
        if(!empty($request)){
            //Recogemos los datos del usuario
            $user = auth()->user()->id;

            //Recogemos el postID
            $postID = $request->postID;

            //Verificar que existe el like del usuario
            $issetReactionUser = DB::table('reactionposts')->where('user_id', $user)
                                ->where('post_id', $postID)
                                ->count();

            $reactionActiveArray = DB::table('reactionposts')->where('user_id', $user)
                                ->where('post_id', $postID)->get('active');

            $reaction = json_decode($reactionActiveArray, true);

            DB::beginTransaction();

            try{
                if($issetReactionUser == 0){
                    $like = DB::table('reactionposts')->insert([
                        'user_id' => $user,
                        'post_id' => $postID,
                        'active' => 1
                    ]);

                    DB::commit();

                    $data = [
                        'code' => 200,
                        'status' => 'success',
                        'message' => 'Haz publicado tu reaccion correctamente'
                    ];
        
                }else{
                    if($reaction[0]['active'] === 1){
                        DB::table('reactionposts')->where('user_id', $user)
                            ->where('post_id', $postID)->update(['active' => 0]);

                        DB::commit();
                        
                        $data = [
                            'code' => 200,
                            'status' => 'success',
                            'message' => 'Haz quitado tu reaccion correctamente'
                        ];
                    }

                    if($reaction[0]['active'] === 0){
                        DB::table('reactionposts')->where('user_id', $user)
                            ->where('post_id', $postID)->update(['active' => 1]);

                        DB::commit();

                        $data = [
                            'code' => 200,
                            'status' => 'success',
                            'message' => 'Haz publicado tu reaccion correctamente'
                        ];
                    }
                }
            }catch (\Illuminate\Database\QueryException $e) {
                DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                    //$response['message'] = $e->errorInfo;
                    //dd($e->errorInfo[2]);
                    abort(500, $e->errorInfo[2]); //en la poscision 2 del array est?? el mensaje
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

    public function categoryPost($id)
    {
        //Obtenemos todo el objeto de la categoria por medio del ID
        $categoryPost = Category::find($id);

        //Sacamos solo el nombre de la categoria para mostrarla en un alert
        $categoryPostName = $categoryPost->name;
        $idCategory = $id;

        //En la tabla pivote, obtenemos el/los ID de los post que hace referencia a la categoria
        $postID = DB::table('category_post')->where('category_id', $id)->get('post_id');

        //Decodificamos los datos anteriores para tener una mejor manipulacion y obtener el/los ID del podcast
        $postDecode = json_decode($postID, true);
        $postObject = json_decode($postID, true);

        //Al obtener el valor decodificado lo mandamos a llamar con un find para sacar el/los objecto completo
        $posts = Post::where('id', $postDecode)->with('likes')->with('userLikesNew')->with('comments.user')->orderBy('created_at', 'desc')->get();//El estado es activo

        /******************************************************************************************************** */

        //De la tabla pivote, sacamos solo los category_id
        $category_id = DB::table('category_post')->get('category_id');

        //Decodificamos el array con json_decode
        $categoryID = json_decode($category_id, true);

        //La variable anterior la utilizamos para sacar solo las categorias con esos ID's
        $categories = Category::find($categoryID);

        if(!empty($categoryPost) && !empty($posts) && !empty($categories)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'posts' => $posts,
                'categories' => $categories,
                //'categoryPodcastName' => $categoryPostName,
                'idCategory' => $idCategory
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