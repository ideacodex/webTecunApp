<?php

namespace App\Http\Controllers;

use App\Job;
use App\Category;
use App\Status;
use App\User;
use App\Award;

use App\Setting;

use Illuminate\Support\Facades\Mail;
use App\Mail\JobDataUser;
use App\Mail\JobDataAdmin;

use Illuminate\Support\Facades\Storage;

use DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JobController extends Controller
{

    public function home(Request $request){
        
        $title = $request->get('search');
        $jobs = Job::where('title', 'like', "%$title%")->paginate(5);

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
        $settingAll = Setting::all();
        if ($settingAll) {
            $setting = $settingAll->first();
        }

        return view("jobs.create", [
            "status" => $status, 
            "categories" => $categories,
            'setting' => $setting
        ]);

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
            $job->public_link = $request->public_link;
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
            $job->public_link = $request->public_link;
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
    public function destroy($id)
    {
        $record = Job::find($id);
        $record->delete();

        return redirect()->action('JobController@index')
                    ->with(['message' => 'Se elimino el registro correctamente', 'alert' => 'danger']);
        
    }


    public function jobs(Request $request)
    {
        //
        $title = $request->get('search');
        $description = $request->get('search');
        $skils = $request->get('search');
        $jobs = Job::where('title', 'like', "%$title%")
                ->orWhere('description', 'like', "%$description%")
                ->orWhere('skils', 'like', "%$skils%")
                ->orderBy('created_at', 'desc')
                ->get();

        return view("jobs.home", ["jobs" => $jobs]);
    }

    public function job($id){
        $job = Job::findOrFail($id);
        return view('jobs.show', ['job' => $job]);
    }

    public function apply(Request $request)
    {
        $user = auth()->user();

        if(isset($user)){
            request()->validate([
                '_token' => 'required',
                'document' => 'required'
            ]);

            try{
                $document = $request->hasFile('document');
                $filename = $request->email;
                $extension = $request->file('document')->getClientOriginalExtension();
                $pdfNameToStore = $request->email . '.' . $extension;
                $request->pdfNameToStore = $pdfNameToStore;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('document')->storeAs('public/jobs', $pdfNameToStore);

                /********Ruta completa de Path Para enviar arviso adjuntos*********/
                //Traemos todo el path (app/storage/app/public/(disk))
                $view = Storage::disk('jobs')->getAdapter()->getPathPrefix();

                //En el pdfNameToStore, esta el nombre del archivo concatenado con .pdf
                //Para unirlo utilizamos todo el path seguido de un "." y el nombre con extencion
                $pathFull = $view.$pdfNameToStore;

                //Mandamos la info por request al modelo del Mail
                $request->pathFull = $pathFull;
                /********Ruta completa de Path Para enviar arviso adjuntos*********/

                //Recoger el mensaje enviado
                $comment = $request->comment;

                //Recoger la identidad del usuario
                $userIdentity = $user;

                /***************Correo para Postulado***********************/
                Mail::to([$request->email])
                    ->send(new JobDataUser($request)); //envia la variables $request a la clase de MAIL
                /***************Correo para Postulado***********************/

                /****************Correo para RRHHAdmin***********************/
                Mail::to([$request->emailCompany])
                    ->send(new JobDataAdmin($request)); //envia la variables $request a la clase de MAIL
                /****************Correo para RRHHAdmin***********************/

                Storage::disk('jobs')->delete($pdfNameToStore);

                return redirect()->action('JobController@jobs')
                    ->with(['message' => 'Solicitud enviada correctamente', 'alert' => 'success']);
    
            }catch (\Illuminate\Database\QueryException $e) {
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje

                return response()->json($response, 500);
                return redirect()->action('JobController@jobs')
                        ->with(['message' => 'Error al enviar el correo', 'alert' => 'warning']);
            }

        }else{
            request()->validate([
                'name' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'document' => 'required',
                'comment' => 'required'
            ]);

            try{
                //Recoger los campos de tipo Input
                $name = $request->name;
                $lastname = $request->lastname;
                $email = $request->email;
                $phone = $request->phone;

                //Recoger el mensaje enviado
                $comment = $request->comment;

                //Recoger el archivo enviado por post
                $document = $request->hasFile('document');
                $filename = $request->email;
                $extension = $request->file('document')->getClientOriginalExtension();
                $pdfNameToStore = $request->email . '.' . $extension;
                $request->pdfNameToStore = $pdfNameToStore;

                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('document')->storeAs('public/jobs', $pdfNameToStore);

                /********Ruta completa de Path Para enviar arviso adjuntos*********/
                //Traemos todo el path (app/storage/app/public/(disk))
                $view = Storage::disk('jobs')->getAdapter()->getPathPrefix();

                //En el pdfNameToStore, esta el nombre del archivo concatenado con .pdf
                //Para unirlo utilizamos todo el path seguido de un "." y el nombre con extencion
                $pathFull = $view.$pdfNameToStore;

                //Mandamos la info por request al modelo del Mail
                $request->pathFull = $pathFull;
                /********Ruta completa de Path Para enviar arviso adjuntos*********/

                /***************Correo para Postulado***********************/
                Mail::to([$request->email])
                    ->send(new JobDataUser($request)); //envia la variables $request a la clase de MAIL
                /***************Correo para Postulado***********************/

                /****************Correo para RRHHAdmin***********************/
                Mail::to([$request->emailCompany])
                    ->send(new JobDataAdmin($request)); //envia la variables $request a la clase de MAIL
                /****************Correo para RRHHAdmin***********************/

                Storage::disk('jobs')->delete($pdfNameToStore);

                return redirect('/');

            }catch (\Illuminate\Database\QueryException $e) {
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($response, 500);

                return redirect()->action('JobController@jobs')
                        ->with(['message' => 'Error al enviar el mail', 'alert' => 'warning']);
            }
        }
    }
}
