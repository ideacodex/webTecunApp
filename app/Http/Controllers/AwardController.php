<?php

namespace App\Http\Controllers;

use App\Award;
use App\Category;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $awards = Award::with('user')->with('category')->get();
        return view("awards.index", ["awards" => $awards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $categories = Category::all();
        return view("awards.create", ["users" => $users, "categories" => $categories]);

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
            'image' => 'required|image',
            'user_id' => 'required',
            'type_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $award = new Award;
            $award->user_id = $request->user_id;
            $award->type_id = $request->type_id;

            if($request->active == 1 || $request->active == 'Si'){
                $award->active = 1;
            }else{
                $award->active = 0;
            }

            $award->save();
            //******carga de imagen**********//
            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageNameToStore = $award->id . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('image')->storeAs('public/awards', $imageNameToStore);
                //dd($path);

                $award->url_image = $imageNameToStore;
                $award->save();
            }
            //******carga de imagen**********//

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array est?? el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'AwardController@index')->with(['message' => 'Se agreg?? el registro correctamente', 'alert' => 'warning']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function show(Award $award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $award=Award::findOrFail($id);
        $users = User::all();
        $categories = Category::all();

        return view("awards.edit", ["users" => $users, "categories" => $categories, 'award'=>$award]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        DB::beginTransaction();
        try {
            $award = Award::findOrFail($id);

            if($request->user_id){
                $award->user_id = $request->user_id;
            }else{
                unset($award->user_id);
            }

            $award->type_id = $request->type_id;


            if($request->active == 1 || $request->active == 'Si'){
                $award->active = 1;
            }else{
                $award->active = 0;
            }

            $award->save();
            //******carga de imagen**********//
            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageNameToStore = $award->id . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('image')->storeAs('public/awards', $imageNameToStore);
                //dd($path);

                $award->url_image = $imageNameToStore;
                $award->save();
            }
            //******carga de imagen**********//

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array est?? el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'AwardController@index')->with(['message' => 'Se actualiz?? el registro correctamente', 'alert' => 'warning']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $record = Award::find($id);
        Storage::disk('awards')->delete($record->url_image);
        //dd($record);
        $record->delete();
        return redirect()->action( //regresa con el error
            'AwardController@index')->with(['message' => 'Se elimin?? el registro correctamente', 'alert' => 'danger']);

    }

    public function specialTeam()
    {
        //
        $awards = Award::with('user')->with('category')->get();
        return view("awards.specialteam", ["awards" => $awards]);
    }
}
