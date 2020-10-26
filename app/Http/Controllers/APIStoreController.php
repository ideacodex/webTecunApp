<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\Response;
use Illuminate\Support\Facades\Auth;
use App\Store;
use App\Status;

class APIStoreController extends Controller
{
    public function index()
    {
        $store = Store::all();

        if(empty($store)){
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'No hay records almacenados'
            ];
        }else{
            $data = [
                'code' => 200,
                'status' => 'success',
                'store' => $store
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function show($id)
    {
        $store = Store::find($id);

        if(is_object($store)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'store' => $store
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'No se puede visualizar la agencia'
            ];
        }

        return response()->json($data, $data['code']);
    }
}
