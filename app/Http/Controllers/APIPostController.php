<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Post;

class APIPostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();

        if(!empty($posts)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'posts' => $posts
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'No hay noticias para mostrar'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        if(is_object($post)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'post' => $post
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'No existe la noticia'
            ];
        }

        return response()->json($data, $data['code']);
    }

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

    public function getVideo($featured_video)
    {
        $isset = \Storage::disk('posts')->exists($featured_video);

        if($isset){
            $file = \Storage::disk('posts')->get($featured_video);

            return new response($file, 200);
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'No existe el video'
            ];
        }

        return response()->json($data, $data['code']);
    }
}
