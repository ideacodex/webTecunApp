<?php

namespace App\Http\Controllers;

use App\Picture;
use App\Status;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pictures = Picture::all();
        return view("pictures.index", ["pictures" => $pictures]);
    }

    public function home()
    {
        //
        $pictures = Picture::all();
        return view("pictures.home", ["pictures" => $pictures]);
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
        
        return view("pictures.create", ["status" => $status]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request['article-trixFields']['content']);

        //dd($request);

        request()->validate([
            '_token' => 'required',
            'title' => 'required',
            'image' => 'required'
        ]);

        DB::beginTransaction();
        try {

            //encontrar y asignar rol de Spatie
            $picture = new Picture;
            $picture->title = $request->title;
            $picture->user_id = auth()->user()->id;
            $picture->status_id = $request->status_id;
            $picture->save();

            //******carga de imagen**********//
            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageNameToStore = $picture->id . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('image')->storeAs('public/pictures', $imageNameToStore);
                //dd($path);

                $picture->featured_image = $imageNameToStore;
                $picture->save();

            } else {
                $imageNameToStore = 'no_image.jpg';
            }

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
            return redirect()->action('PictureController@create')
                    ->with(['message' => 'Error al subir la imagen', 'alert' => 'warning']);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'PictureController@index')->with(['message' => 'Se agregó el registro correctamente', 'alert' => 'warning']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $picture = Picture::findOrFail($id);

        return view("pictures.show", [
            "picture" => $picture
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $picture = Picture::findOrFail($id);
        $status = Status::all();

        return view("pictures.edit", [
            "status" => $status,
            "picture" => $picture
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            '_token' => 'required',
            'title' => 'required',
            'image' => 'required'
        ]);

        DB::beginTransaction();
        try {

            //encontrar y asignar rol de Spatie
            $picture = Picture::findOrFail($id);
            $picture->title = $request->title;
            $picture->user_id = auth()->user()->id;
            $picture->status_id = $request->status_id;
            $picture->save();

            //******carga de imagen**********//
            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageNameToStore = $picture->id . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('image')->storeAs('public/pictures', $imageNameToStore);
                //dd($path);

                $picture->featured_image = $imageNameToStore;
                $picture->save();

            } else {
                $imageNameToStore = 'no_image.jpg';
            }

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
            return redirect()->action('PictureController@edit')
                    ->with(['message' => 'Error al actualizar la imagen', 'alert' => 'warning']);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'PictureController@index')->with(['message' => 'Se actualizo el registro correctamente', 'alert' => 'warning']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $picture = Picture::find($id);

        DB::beginTransaction();
        try
        {
            Storage::disk('pictures')->delete($picture->featured_image);

            $picture->delete();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($response, 500);
        }
        DB::commit();

        return redirect()->action('PictureController@index')
                    ->with(['message' => 'Se elimino el registro correctamente', 'alert' => 'danger']);
    }
}