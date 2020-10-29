<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Mail;
use App\Mail\JobDataUser;
use App\Mail\JobDataAdmin;

use Illuminate\Support\Facades\Storage;

use App\Job;

class APIJobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        if(!empty($jobs)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'jobs' => $jobs
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'Sin trabajos por mostrar'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function jobs(Request $request)
    {
        $title = $request->get('search');
        $description = $request->get('search');
        $skils = $request->get('search');
        $jobs = Job::where('title', 'like', "%$title%")
                ->orWhere('description', 'like', "%$description%")
                ->orWhere('skils', 'like', "%$skils%")
                ->get();

        if(!empty($jobs)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'jobs' => $jobs
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'No hay trabajos para mostrar'
            ];
        }       

        return response()->json($data, $data['code']);
        
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);

        if(!empty($job)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'job' => $job
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'Sin datos para mostrar'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function apply(Request $request)
    {
        //Recoger los datos por post
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $user = auth()->user();

        //Verificar que los datos llegan completos
        if(!empty($params_array) && isset($user)){

            //Validamos los datos traidos desde POST
            $validate = \Validator::make($params_array, [
                'name' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'document' => 'required'
            ]);

            if($validate->fails()){
                $data = [
                    'code' => 400,
                    'status' => 'error',
                    'message' => 'Faltan datos'
                ];
            }else{
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
    
                    /***************Correo para Postulado***********************/
                    Mail::to([$request->email])
                        ->send(new JobDataUser($request)); //envia la variables $request a la clase de MAIL
                    /***************Correo para Postulado***********************/
    
                    /****************Correo para RRHHAdmin***********************/
                    Mail::to([$request->emailCompany])
                        ->send(new JobDataAdmin($request)); //envia la variables $request a la clase de MAIL
                    /****************Correo para RRHHAdmin***********************/
    
                    Storage::disk('jobs')->delete($pdfNameToStore);
    
                    $data = [
                        'code' => 200,
                        'status' => 'success',
                        'pathFull' => $pathFull
                    ];

                    return response()->json($data, $data['code']);
        
                }catch (\Illuminate\Database\QueryException $e) {
                    $abort = abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
    
                    return response()->json($response, 500);
                    return $data = [
                        'code' => 404,
                        'status' => 'error',
                        'message' => 'Mensajes no enviados',
                        'abort' => $abort
                    ];
                }
            }
        }else{
            //Recoger los datos por post
            $json = $request->input('json', null);
            $params = json_decode($json);
            $params_array = json_decode($json, true);

            //Verificar que los datos llegan completos
            if(!empty($params_array)){
                $validate = \Validator::make($params_array, [
                    'name' => 'required',
                    'lastname' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'document' => 'required',
                    'comment' => 'required'
                ]);

                if($validate->fails()){
                    $data = [
                        'code' => 400,
                        'status' => 'error',
                        'message' => 'Faltan datos'
                    ];  
                }else{
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
        
                        $data = [
                            'code' => 200,
                            'status' => 'success',
                            'pathFull' => $pathFull
                        ];

                        return response()->json($data, $data['code']);

                    }catch (\Illuminate\Database\QueryException $e) {
                        $abort = abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                        
                        return $data = [
                            'code' => 404,
                            'status' => 'error',
                            'message' => 'Mensajes no enviados',
                            'abort' => $abort
                        ];
                        return response()->json($response, 500);
                    }
                }
            }else{
                $data = [
                    'code' => 400,
                    'status' => 'error',
                    'message' => 'Datos invalidos'
                ];

                return response()->json($data, $data['code']);
            }
        }
    }
}
