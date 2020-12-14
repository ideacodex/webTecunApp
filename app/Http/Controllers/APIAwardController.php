<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Award;

class APIAwardController extends Controller
{
    public function index()
    {
        $awards = Award::with('user')->get();
        $pathImage = '/storage/awards/';

        if(empty($awards)){
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'No hay reconocimientos'
            ];
        }else{
            $data = [
                'code' => 200,
                'status' => 'success',
                'award' => $awards,
                'pathImage' => $pathImage
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function getImage($url_image)
    {
        //Comprobar si existe el fichero
        $isset = \Storage::disk('awards')->exists($url_image);

        if($isset){
            //Conseguir la imagen en el Storage
            $file = \Storage::disk('awards')->get($url_image);

            return new response($file, 200);

        }else{
            // Mostrar el posible error 
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'La imagen no existe'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function carousel()
    {
        //Buscar las imagenes en la DB dependiendo del Type_id
        $award = Award::with('user')->with('category')->get();

        if(empty($award)){
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Error al obtener los datos'
            ];

        }else{
            $data = [
                'code' => 200,
                'status' => 'success',
                'award' => $award
            ];
        }

        return response()->json($data, $data['code']);
    }
}
