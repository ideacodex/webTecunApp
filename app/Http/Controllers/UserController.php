<?php

namespace App\Http\Controllers;

use App\Score;
use App\Status;
use App\User;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view("users.index", ["users" => $users]);
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
        $roles = Role::all();
        return view("users.create", ["status" => $status, "roles" => $roles]);
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
            'dpi' => 'required|unique:users',
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required',
            'status_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            //encontrar y asignar rol de Spatie
            $roleName = Role::find($request->role_id); //obtiene el roll desde la base de datos

            $score = new Score;
            $score->points = 0;
            $score->wrong = 0;
            $score->correct = 0;
            $score->save();

            $users = new User;
            $users->dpi = $request->dpi;
            $users->name = $request->name;
            $users->lastname = $request->lastname;
            $users->email = $request->email;
            $users->phone = $request->phone;
            $users->password = bcrypt($request->password);
            $users->role_id = $request->role_id;
            $users->status_id = $request->status_id;
            $users->score_id = $score->id;
            $users->save();
            $users->syncRoles([$roleName->name]);
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'UserController@index')->with(['message' => 'Se agregó el registro correctamente', 'alert' => 'warning']);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $users = User::findOrFail($id);
        $status = Status::all();
        $roles = Role::all();
        return view("users.edit", ["status" => $status, "roles" => $roles, 'user' => $users]);
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
        request()->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role_id' => 'required',
            'status_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            //encontrar y asignar rol de Spatie
            $roleName = Role::find($request->role_id); //obtiene el roll desde la base de datos

            $users = User::findOrFail($id);
            $users->dpi = $request->dpi;
            $users->name = $request->name;
            $users->lastname = $request->lastname;
            $users->email = $request->email;
            $users->phone = $request->phone;
            $users->password = bcrypt($request->password);
            $users->role_id = $request->role_id;
            $users->status_id = $request->status_id;
            $users->save();
            $users->syncRoles([$roleName->name]);
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'UserController@index')->with(['message' => 'Se actualizo el registro correctamente', 'alert' => 'warning']);
    
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
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->action( //regresa con el error
            'UserController@index')->with(['message' => 'Se eliminó el registro', 'alert' => 'danger']);
    
    }

    public function view()
    {
        $userID = auth()->user()->id;
        $user = User::find($userID);

        return view('users.setting',[
            'user' => $user
        ]);
    }

    public function updateUser(Request $request)
    {
        $userID = $request->userID;

        DB::beginTransaction();

        if(isset($userID) && !empty($userID)){
            try{
                $user = User::find($userID);
                $user->name = $request->name;
                $user->lastname = $request->lastname;
                $user->phone = $request->phone;
                $user->email = $request->email;

                $user->update();

            }catch (\Illuminate\Database\QueryException $e) {
                DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($response, 500);
                return \Redirect::back()->with([
                    'message' => 'No haz publicado tu comentario, vuelve a intentar',
                    'alert' => 'danger'
                ]);
            }
        }else{
            return \Redirect::back()->with([
                'message' => 'No haz publicado tu comentario, vuelve a intentar',
                'alert' => 'danger'
            ]);
        }

        DB::commit();

        return \Redirect::back()->with([
            'message' => 'Haz actualizado tus datos correctamente',
            'alert' => 'success'
        ]);

    }
}
