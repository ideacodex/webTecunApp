<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Award;
use App\User;
use DB;

class APIAwardController extends Controller
{
    public function index()
    {
        $award = Award::all();

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'award' => $award
        ]);
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
        $award = Award::where('type_id', 0)->get('url_image');

        if(empty($award)){
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Error al obtener los datos'
            ];

            return response()->json($data, $data['code']);

        }else{
            if($award->type_id == 0){
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'award' => $award
                ];
    
                return respose()->json($data, $data['code']);
    
            }else{
                $award = Award::where('type_id', 1)->get('url_image');
    
                if($award->type_id == 1){
                    $data = [
                        'code' => 200,
                        'status' => 'success',
                        'award' => $award
                    ];
    
                    return response()->json($data, $data['code']);
                }
            }
        }

    }
}
