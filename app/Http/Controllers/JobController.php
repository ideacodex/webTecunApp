<?php

namespace App\Http\Controllers;

use App\Job;
use App\Category;
use App\Status;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function home(){
        $jobs = Job::all();
        return view("jobs.home", ["jobs" => $jobs]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Job::all();
        return view("jobs.index", ["jobs" => $jobs]);
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
        $categories = Category::all();
        return view("jobs.create", ["status" => $status, "categories" => $categories]);

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
            'title' => 'required',
            'description' => 'required',
            'email' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $job = new Job;
            $job->title = $request->title;
            $job->description = $request->description;
            $job->salary = $request->salary;
            $job->email = $request->email;
            $job->skils = $request->editordata;
            $job->save();
            
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'JobController@index')->with(['message' => 'Se agregó el registro correctamente', 'alert' => 'success']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobs = Job::findOrFail($id);
        return view("jobs.show", ["jobs" => $jobs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $job = Job::findOrFail($id);
        $categories = Category::all();
        return view("jobs.edit", ["categories" => $categories,  'job' => $job]);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'email' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $job = Job::findOrFail($id);
            $job->title = $request->title;
            $job->description = $request->description;
            $job->salary = $request->salary;
            $job->email = $request->email;
            $job->skils = $request->editordata;
            $job->save();
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'JobController@index')->with(['message' => 'Se actualizó el registro correctamente', 'alert' => 'success']);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        
    }


    public function jobs()
    {
        //
        $jobs = Job::all();
        return view("jobs.home", ["jobs" => $jobs]);
    }

    public function job($id){
        $job = Job::findOrFail($id);
        return view('jobs.show', ['job' => $job]);
    }
}
