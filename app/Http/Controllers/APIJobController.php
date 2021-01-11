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
    public function jobs(Request $request)
    {
        //Recoger los datos por get
        $search = $request->input('search');

        //Verificamos que la variable exista y que llego con algun dato
        if(isset($search) && !is_null($search)){
            $title = $search;
            $description = $search;
            $skils = $search;
            $jobs = Job::where('title', 'like', "%$title%")
                ->orWhere('description', 'like', "%$description%")
                ->orWhere('skils', 'like', "%$skils%")
                ->orderBy('created_at', 'desc')
                ->get();

            $data = [
                'code' => 200,
                'status' => 'success',
                'jobs' => $jobs
            ];
        }else{
            $jobs = Job::orderBy('created_at', 'desc')->get();

            $data = [
                'code' => 200,
                'status' => 'success',
                'jobs' => $jobs
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

    public function applyUploadDocument(Request $request, $email)
    {
        //El documento sera traido desde la peticion 
        $document = $request->hasFile('document');

        //Validamos el documento
        $validate = \Validator::make($request->all(), [
            'document' => 'required'
        ]);

        //Guardamos el documento en disk
        if(empty($document) && $validate->fails()){
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'Error al subir el documento'
            ];
        }else{
            $filename = $email;
            $extension = $request->file('document')->getClientOriginalExtension();
            $pdfNameToStore = $filename . '.' . $extension;
            $request->pdfNameToStore = $pdfNameToStore;

            // Upload Image //********nombre de carpeta para almacenar*****
            $path = $request->file('document')->storeAs('public/jobs', $pdfNameToStore);

            $data = [
                'code' => 200,
                'status' => 'success',
                'document' => $pdfNameToStore
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function apply(Request $request, $pdfNameToStore)
    {
        //Inicializamos las variables
        $email = null;
        $emailCompany = null;

        //Recoger los datos por post
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $request = new Request($params_array);

        //Validamos si el usuario esta autenticado
        $user = auth()->user();

        //Verificar que los datos llegan completos
        if(!empty($params_array) && isset($user)){

            //Validamos los datos traidos desde POST
            $validate = \Validator::make($params_array, [
                'name' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required'
            ]);

            if($validate->fails()){
                $data = [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Faltan datos'
                ];
            }else{
                try{
                    //test para asignar valor a las variables
                    $email = $params->email;
                    $emailCompany = $params->emailCompany;

                    /********Ruta completa de Path Para enviar archivos adjuntos*********/
                    //Traemos todo el path (app/storage/app/public/(disk))
                    $view = Storage::disk('jobs')->getAdapter()->getPathPrefix();
    
                    //En el pdfNameToStore, esta el nombre del archivo concatenado con .pdf
                    //Para unirlo utilizamos todo el path seguido de un "." y el nombre con extencion
                    $pathFull = $view.$pdfNameToStore;
    
                    //Mandamos la info por request al modelo del Mail
                    $request->pathFull = $pathFull;
                    /********Ruta completa de Path Para enviar archivos adjuntos*********/
    
                    /***************Correo para Postulado***********************/
                    Mail::to([$email])
                        ->send(new JobDataUser($request)); //envia la variables $request a la clase de MAIL
                    /***************Correo para Postulado***********************/
    
                    /****************Correo para RRHHAdmin***********************/
                    Mail::to([$emailCompany])
                        ->send(new JobDataAdmin($request)); //envia la variables $request a la clase de MAIL
                    /****************Correo para RRHHAdmin***********************/
    
                    Storage::disk('jobs')->delete($pdfNameToStore);
    
                    $data = [
                        'code' => 200,
                        'status' => 'success',
                        'message' => 'Correo enviado exitosamente, en tu correo electronico, llegara un mensaje de verificacion'
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
            
            //Verificar que los datos llegan completos
            if(!empty($params_array) || !empty($params)){
                $validate = \Validator::make($params_array, [
                    'name' => 'required',
                    'lastname' => 'required',
                    'email' => 'required',
                    'phone' => 'required'
                ]);

                if($validate->fails()){
                    $data = [
                        'code' => 400,
                        'status' => 'error',
                        'message' => 'Faltan datos'
                    ];  
                }else{
                    try{
                        //test para asignar valor a las variables
                        $email = $params->email;

                        $emailCompany = $params->emailCompany;

                        /********Ruta completa de Path Para enviar arviso adjuntos*********/
                        //Traemos todo el path (app/storage/app/public/(disk))
                        $view = Storage::disk('jobs')->getAdapter()->getPathPrefix();
        
                        //En el pdfNameToStore, esta el nombre del archivo concatenado con .pdf
                        //Para unirlo utilizamos todo el path seguido de un "." y el nombre con extencion
                        $pathFull = $view.$pdfNameToStore;
        
                        //Mandamos la info por params al modelo del Mail
                        $request->pathFull = $pathFull;
                        /********Ruta completa de Path Para enviar arviso adjuntos*********/
        
                        /***************Correo para Postulado***********************/
                        Mail::to([$email])
                            ->send(new JobDataUser($request)); //envia la variables $request a la clase de MAIL
                        /***************Correo para Postulado***********************/
        
                        /****************Correo para RRHHAdmin***********************/
                        Mail::to([$emailCompany])
                            ->send(new JobDataAdmin($request)); //envia la variables $request a la clase de MAIL
                        /****************Correo para RRHHAdmin***********************/
        
                        Storage::disk('jobs')->delete($pdfNameToStore);
        
                        $data = [
                            'code' => 200,
                            'status' => 'success',
                            'message' => 'Correo enviado exitosamente',
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
                        return response()->json($data, 500);
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
