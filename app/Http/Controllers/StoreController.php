<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

use App\Status;
use DB;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stores = Store::all();
        return view("stores.index", ["stores" => $stores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $status = Status::all();
        return view("stores.create", ["status" => $status]);
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
            'name' => 'required',
            'address' => 'required',
            'schedule' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $store = new Store;
            $store->name = $request->name;
            $store->address = $request->address;
            $store->schedule = $request->schedule;
            $store->number = $request->number;
            $store->maps = $request->maps;
            $store->waze = $request->waze;
            $store->save();
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'StoreController@index')->with(['message' => 'Se agregó el registro correctamente', 'alert' => 'success']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $store = Store::findOrFail($id);
        return view("stores.edit", ['store' => $store]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'name' => 'required',
            'address' => 'required',
            'schedule' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $store = Store::findOrFail($id);
            $store->name = $request->name;
            $store->address = $request->address;
            $store->schedule = $request->schedule;
            $store->number = $request->number;
            $store->maps = $request->maps;
            $store->waze = $request->waze;
            $store->save();
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'StoreController@index')->with(['message' => 'Se actualizó el registro correctamente', 'alert' => 'success']);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $store = Store::find($id);
        $store->delete();

        return redirect()->action('StoreController@index')
            ->with(['message' => 'Agencia eliminada correctamente', 'alert' => 'danger']);
    }

    public function stores(Request $request)
    {
        //
        $name = $request->get('search');
        $stores = Store::where('name', 'like', "%$name%")
        ->orWhere('address', 'like', "%$name%")
        ->get();

        return view("stores.home", ["stores" => $stores]);
    }
}
