<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\Response;
use Illuminate\Support\Facades\Auth;
use App\Store;
use App\Status;

class APIStoreController extends Controller
{
    public function index(Request $request)
    {
        //Recoger los datos por get
        $search = $request->input('search');

        //Verificamos que la variable exista y que llego con algun dato
        if(isset($search) && !is_null($search)){
            $name = $search;

            //Utilizamos la variable para buscarla en el metodo
            $store = Store::where('name', 'like', "%$name%")
                        ->orWhere('address', 'like', "%$name%")
                        ->orderBy('created_at', 'desc')
                        ->get();

            //Pasamos los datos en un array con status success
            $data = [
                'code' => 200,
                'status' => 'success',
                'store' => $store
            ];
        }else{

            //Si no tenemos nada en la variable search sacamos todos los elementos
            $store = Store::orderBy('created_at', 'desc')->get();

            //Pasamos los datos en un array con status success
            $data = [
                'code' => 200,
                'status' => 'success',
                'store' => $store
            ];
        }

        return response()->json($data, $data['code']);
    }
}
