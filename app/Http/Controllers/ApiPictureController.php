<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use DB;

class ApiPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Picture::orderBy('created_at', 'desc')->get();
        $response = [
            'data' => null,
            'success' => false,
            'error' => null,
            'message' => null
          ];
          if ($data) {
            $response['success']= true;
            $response['data']= $data;
            return response()->json($response, 200);
          }
          else{
            $response['error']= 'No hay ningun registro';
            return response()->json($response, 200);
          }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
