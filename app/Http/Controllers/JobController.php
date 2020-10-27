<?php

namespace App\Http\Controllers;

use App\Job;
use App\Category;
use App\Status;
use App\User;
use App\Award;

use Illuminate\Support\Facades\Mail;
use App\Mail\JobDataUser;

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
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('document')->storeAs('public/jobs', $pdfNameToStore);

                $realPath = 'public/jobs'.$pdfNameToStore;

                $isset = \Storage::disk('jobs')->exists($pdfNameToStore);

                //Recoger el mensaje enviado
                $comment = $request->comment;

                //Recoger la identidad del usuario
                $userIdentity = $user;

                //Json a enviar
                $data = [
                    'use' => $user,
                    'realPath' => $realPath,
                    'comment' => $comment
                ];

                Mail::send('emails.contactForm', $data, function(Request $request, $message) {
                    $document = $request->hasFile('document');
                    $filename = $request->email;
                    $extension = $request->file('document')->getClientOriginalExtension();
                    $pdfNameToStore = $request->email . '.' . $extension;
                    // Upload Image //********nombre de carpeta para almacenar*****
                    $path = $request->file('document')->storeAs('public/jobs', $pdfNameToStore);

                    $realPath = 'public/jobs'.$pdfNameToStore;

                    $data = [
                        'realPath' => $realPath
                    ];

                    $message->to('gsalazar@pctecbus.co');
                    
                    $message->cc('norellana@pctecbus.co', 'gyuman@pctecbus.co');
    
                    $message->attach($data['realPath']);
    
                    $message->getSwiftMessage();
                });

                dd('Correo enviado');
    
                return back()->with(['message' => 'Correo enviado exitosamente']);

                Mail::to(['gsalazar@pctecbus.co','norellana@pctecbus.co', 'gyuman@pctecbus.co'])
                    ->send(new JobDataUser($request))
                    ->attach($realPath); //Envia un archivo adjunto

                if($isset){
                    $isset = \Storage::disk('jobs')->get($pdfNameToStore);
                    dd($isset);
                    $file = \Storage::disk('jobs')->get($pdfNameToStore);
                }else{
                    dd('No hay naiden');
                }
    
            }catch (\Illuminate\Database\QueryException $e) {
                DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($response, 500);
                return redirect()->action('JobController@jobs')
                        ->with(['message' => 'Error al enviar el correo', 'alert' => 'warning']);
            }
            DB::commit();
            //return Mail::to($data['mail'])->send(new JobDataUser($data));
            Mail::to(['gsalazar@pctecbus.co'])
                ->cc('norellana@pctecbus.co') // enviar correo con copia
                ->send(new JobDataUser($request)); //envia la variables $request a la clase de MAIL
                //dd($request);

        }else{
            request()->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'document' => 'required',
                'message' => 'required'
            ]);

            DB::beginTransaction();

            try{
                //Recoger el archivo enviado por post
                $document = $request->hasFile('document');
                $filename = $request->_token;
                $extension = $request->file('document')->getClientOriginalExtension();
                $pdfNameToStore = $request->_token . '.' . $extension;

                //Recoger los demas campos de tipo Input
                $name = $request->name;
                $email = $request->email;
                $phone = $request->phone;
                $message = $request->message;

                $data = [
                    'pdfToStore' => $pdfNameToStore,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'message' => $message
                ];

            }catch (\Illuminate\Database\QueryException $e) {
                DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($response, 500);
                return redirect()->action('JobController@jobs')
                        ->with(['message' => 'Error al enviar el mail', 'alert' => 'warning']);
            }
            DB::commit();
            Mail::to(['gsalazar@pctecbus.co'])
            ->cc('norellana@pctecbus.co') // enviar correo con copia
            ->send(new JobDataUser($request)); //envia la variables $request a la clase de MAIL
            //dd($request);
        }

    }
}
