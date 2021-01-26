<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Category;
use DB;

class APICategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        if(empty($categories)){
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'Sin categorias para mostrar'
            ];
        }else{
            $data = [
                'code' => 200,
                'status' => 'success',
                'categories' => $categories
            ];            
        }

        return response()->json($data, $data['code']);

    }
}
