<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Favorite;    
use DB;


class ApiContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Contact::all();
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
        $nombre = $request->get('searchNombre');
        $departamento = $request->get('searchDepartamento');
        $pais = $request->get('searchPais');
        $puesto = $request->get('searchPuesto');
        $data = Contact::where('nombre', 'LIKE', "%$nombre%")
                    ->where('departamento', 'LIKE', "%$departamento%")
                    ->where('pais', 'LIKE', "%$pais%")
                    ->where('puesto', 'LIKE', "%$puesto%")
                    ->take(10)
                    ->get();

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

    public function favorites()
    {
        //
        $text = 'null';

        $pbx = Favorite::where("mobile_one", $text)->where("mobile_two", $text)->get();
        $whatsapp = Favorite::where("phone_one", $text)->where("phone_two", $text)->get();

        $data = [
            'code' => 200,
            'satus' => 'success',
            'pbx' => $pbx,
            'whatsapp' => $whatsapp
        ];

        return response()->json($data, $data['code']);
    }
}
