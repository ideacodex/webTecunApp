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

        $settingAll = Setting::all();
        if ($settingAll) {
            $SettingMail = $settingAll->first();
        }

        //Luego de las pruebas poner la variable email en el correo RRHH
        $mailRRHH = $SettingMail->email_rrhh;
        //Luego de las pruebas poner la variable email en el correo RRHH
        
        if(isset($user)){
            try{
                /***************Correo para Solicitante***********************/
                Mail::to([$request->emailUser])
                    ->send(new QueryConstancyUSER($request)); //envia la variables $request a la clase de MAIL
                /***************Correo para Solicitante***********************/

                /****************Correo para RRHH***********************/
                Mail::to(['norellana@pctecbus.co'])
                    ->send(new QueryConstancyRRHH($request)); //envia la variables $request a la clase de MAIL
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
}
