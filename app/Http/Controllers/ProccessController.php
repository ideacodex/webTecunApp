<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Company;
Use App\Setting;
use App\Mail\QueryConstancyRRHH;
use App\Mail\QueryConstancyUSER;
use App\Mail\QueryVacationRRHH;
use App\Mail\QueryVacationUSER;

use DB;

class ProccessController extends Controller
{
    //
    public function proccess()
    {
        return view('users.proccess');
    }

    public function proccessCertification()
    {
        return view('users.proccessCertification');
    }

    public function proccessRRHH()
    {   
        $companies=Company::distinct()->get('name');
        $records=Company::get();
        return view('users.proccessVacation', ['companies' => $companies, 'records' => $records]);
        dd($name);
        $tecunComercial = DB::table('companies')->where('id', 1)->get();
        $tecunAutomotores = DB::table('companies')->where('id', 10)->get();
        $otros = DB::table('companies')->where('id', 15)->get();

        $companiesTecunComercial = DB::table('companies')->where('groupCompanies', 'Tecun Comercial')->get('company');
        $companiesTecunAutomotores = DB::table('companies')->where('groupCompanies', 'Tecun Automotores')->get('company');
        $companiesOtros = DB::table('companies')->where('groupCompanies', 'Otros')->get('company');

        return view('users.proccessRRHH', [
            'tecunComercial' => $tecunComercial,
            'tecunAutomotores' => $tecunAutomotores,
            'otros' => $otros,
            'companiesTecunComercial' => $companiesTecunComercial,
            'companiesTecunAutomotores' => $companiesTecunAutomotores,
            'companiesOtros' => $companiesOtros
        ]); 
    }

    public function mailRRHHVacation(Request $request)
    {
        //
        $user = auth()->user();

        //Luego de las pruebas poner la variable email en el correo rrhhNominal
        $email = $request->email;
        //Luego de las pruebas poner la variable email en el correo rrhhNominal
        
        if(isset($user)){
            try{
                /***************Correo para Solicitante***********************/
                Mail::to([$request->emailUser])
                    ->send(new QueryVacationUSER($request)); //envia la variables $request a la clase de MAIL
                /***************Correo para Solicitante***********************/

                /****************Correo para rrhhNominal***********************/
                Mail::to([$email])
                    ->send(new QueryVacationRRHH($request)); //envia la variables $request a la clase de MAIL
                /****************Correo para rrhhNominal***********************/

                return redirect()->action('ProccessController@proccess')
                    ->with(['message' => 'Solicitud enviada correctamente', 'alert' => 'success']);

            }catch (\Illuminate\Database\QueryException $e) {
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje

                return response()->json($response, 500);
                return redirect()->action('ProccessController@proccess')
                        ->with(['message' => 'Correos no enviados', 'alert' => 'warning']);
            }
        }else{
            return response()->json($response, 500);
            return redirect()->action('ProccessController@proccess')
                    ->with(['message' => 'No existe el usuario', 'alert' => 'warning']);
        }
    }

    public function mailRRHHConstancy(Request $request)
    {
        //
        $user = auth()->user();
        
        if(isset($user)){
            try{
                /***************Correo para Solicitante***********************/
                Mail::to([$request->emailUser])
                    ->send(new QueryConstancyUSER($request)); //envia la variables $request a la clase de MAIL
                /***************Correo para Solicitante***********************/

                /****************Correo para RRHH***********************/
                if ($request->country=="gtm") {
                    Mail::to(['Xacasuy@grupotecun.com', 'gsalazar@pctecbus.co'])
                    ->send(new QueryConstancyRRHH($request)); //envia la variables $request a la clase de MAIL
                }
                if ($request->country=="sv") {
                    Mail::to(['Xrbeltran@grupotecun.com', 'norellana@pctecbus.co'])
                    ->send(new QueryConstancyRRHH($request)); //envia la variables $request a la clase de MAIL
                }
                if ($request->country=="hnd") {
                    Mail::to(['Xmrivera@grupotecun.com', 'gsalazar@pctecbus.co'])
                    ->send(new QueryConstancyRRHH($request)); //envia la variables $request a la clase de MAIL
                }
                /****************Correo para RRHH***********************/

                return redirect()->action('ProccessController@proccess')
                    ->with(['message' => 'Solicitud enviada correctamente', 'alert' => 'success']);

            }catch (\Illuminate\Database\QueryException $e) {
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje

                return response()->json($response, 500);
                return redirect()->action('ProccessController@proccess')
                        ->with(['message' => 'Correos no enviados', 'alert' => 'warning']);
            }
        }else{
            return response()->json($response, 500);
            return redirect()->action('ProccessController@proccess')
                    ->with(['message' => 'No existe el usuario', 'alert' => 'warning']);
        }
    }

    public function allCompany()
    {
        $oneRecord = array(); //guarda solo un registro
        $allRecords = array(); //guardara un array por cada nombre y muchos array que coinciden con el nombre
        $companiesName = Company::distinct()->get('name');
        $records = Company::get();

        foreach ($companiesName as $item) {
            $records=Company::where('name',$item->name)->get();
            $temporalRecords = array(); //inicializamos el array por cada iteracion o nombre
            foreach ($records as $record) {
                $oneRecord = array(
                    'name' => $record->name,
                    'departament' => $record->departament,
                    'email' => $record->email,
                );
                array_push($temporalRecords, $oneRecord);
            }
            array_push($allRecords, $temporalRecords);
        }
        $data = [
            'code' => 200,
            'status' => 'success',
            'companies' => $allRecords
        ];

        return response()->json($data, $data['code']);
    }

    public function mailVacation(Request $request)
    {

        $user = auth()->user();
        $request->name = $user->name;
        $request->lastname = $user->lastname;
        $request->emailUser = $user->email;

        //Luego de las pruebas poner la variable email en el correo rrhhNominal
        //Luego de las pruebas poner la variable email en el correo rrhhNominal
        
        if(isset($user)){
            try{
                /***************Correo para Solicitante***********************/
                Mail::to([$request->emailUser])
                    ->send(new QueryVacationUSER($request)); //envia la variables $request a la clase de MAIL
                /***************Correo para Solicitante***********************/

                /****************Correo para rrhhNominal***********************/
                Mail::to([$request->email])
                    ->send(new QueryVacationRRHH($request)); //envia la variables $request a la clase de MAIL
                /****************Correo para rrhhNominal***********************/

                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Solicitud enviada correctamente'
                ];

            }catch (\Illuminate\Database\QueryException $e) {
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje

                $data = [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Error al enviar el correo'
                ];
            }
        }else{

            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'Usuario no autenticado'
            ];
        }

        return response()->json($data, $data['code']);
    } 

    public function mailConstancy(Request $request)
    {
        //
        $user = auth()->user();
        $request->name = $user->name;
        $request->lastname = $user->lastname;
        $request->emailUser = $user->email;
        
        if(isset($user)){
            try{
                /***************Correo para Solicitante***********************/
                Mail::to([$request->emailUser])
                    ->send(new QueryConstancyUSER($request)); //envia la variables $request a la clase de MAIL
                /***************Correo para Solicitante***********************/

                /****************Correo para RRHH***********************/
                if ($request->country=="gtm") {
                    Mail::to([/* 'Xacasuy@grupotecun.com', */'norellana@pctecbus.co', 'gsalazar@pctecbus.co'])
                    ->send(new QueryConstancyRRHH($request)); //envia la variables $request a la clase de MAIL
                }
                if ($request->country=="sv") {
                    Mail::to([/* 'Xrbeltran@grupotecun.com', */ 'norellana@pctecbus.co', 'gsalazar@pctecbus.co'])
                    ->send(new QueryConstancyRRHH($request)); //envia la variables $request a la clase de MAIL
                }
                if ($request->country=="hnd") {
                    Mail::to([/* 'Xmrivera@grupotecun.com', */ 'norellana@pctecbus.co', 'gsalazar@pctecbus.co'])
                    ->send(new QueryConstancyRRHH($request)); //envia la variables $request a la clase de MAIL
                }
                /****************Correo para RRHH***********************/

                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Solicitud enviada correctamente'
                ];

            }catch (\Illuminate\Database\QueryException $e) {
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje

                $data = [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Error al enviar el correo'
                ];
            }
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'Usuario no autenticado'
            ];
        }

        return response()->json($data, $data['code']);
    }
}
