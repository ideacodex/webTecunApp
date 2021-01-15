<?php

namespace App\Http\Controllers;

use App\Favorite;
use DB;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $calls = Favorite::all();

        return view('favorites.index', ['calls' => $calls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('favorites.create');
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
        request()->validate([
            'name' => 'required'
        ]);

        DB::beginTransaction();

        try {
            $favorite = new Favorite;
            $favorite->name = $request->name;
            $favorite->description = $request->description;
            $favorite->phone_one = $request->phone_one;
            $favorite->phone_two = $request->phone_two;
            $favorite->mobile_one = $request->mobile_one;
            $favorite->mobile_two = $request->mobile_two;
            $favorite->save();
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action('FavoriteController@index')
            ->with(['message' => 'Se agregó el registro correctamente', 'alert' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $favorite = Favorite::find($id);
        
        return view('favorites.show', ['favorite' => $favorite]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $favorite = Favorite::find($id);

        return view('favorites.edit', ['favorite' => $favorite]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'name' => 'required'
        ]);

        DB::beginTransaction();

        try {
            $favorite = Favorite::find($id);
            $favorite->name = $request->name;
            $favorite->description = $request->description;
            $favorite->phone_one = $request->phone_one;
            $favorite->phone_two = $request->phone_two;
            $favorite->mobile_one = $request->mobile_one;
            $favorite->mobile_two = $request->mobile_two;
            $favorite->save();
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action('FavoriteController@index')
            ->with(['message' => 'Se actualizo el registro correctamente', 'alert' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favorite = Favorite::find($id);
        $favorite->delete();

        return redirect()->action('FavoriteController@index')
            ->with(['message' => 'Se elimino el registro correctamente', 'alert' => 'success']);
    }

    public function favoritePbx()
    {
        $text = 'null';
        $pbx = Favorite::where("mobile_one", $text)->where("mobile_two", $text)->get();

        return view('favorites.calls', ['pbx' => $pbx]);
    }

    public function favoriteWhatsApp()
    {
        $text = 'null';
        $whatsapp = Favorite::where("phone_one", $text)->where("phone_two", $text)->get();

        return view('favorites.calls', ['whatsapp' => $whatsapp]);   
    }
}
