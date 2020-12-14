<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\denounceAdmin;

use App\Setting;
use App\Denounce;

class DenounceController extends Controller
{
    //
    public function denounce()
    {
        return view('denounce.index');
    }

    public function sendMailDenounce(Request $request)
    {
        //Verificar los datos recibidos
        request()->validate([
            'subject' => 'required',
            'denounce' => 'required'
        ]);

        //Conseguimos el correo de denuncias, que esta en ajustes
        $settingAll = Setting::all();
        $setting = $settingAll->first();
        $emailDenounce = $setting->email_reports;

        //Guardamos los datos en la DB
        $denounce = new Denounce;
        $denounce->subject = $request->subject;
        $denounce->denounce = $request->denounce;
        $denounce->save();

        //Se envia el correo al mail de denuncias, lo enviamos al modelo para enviarlo a la vista
        Mail::to([$emailDenounce])
            ->send(new denounceAdmin($request));
        

            return redirect('/home')->with(['message' => 'Haz enviado tu denuncia correctamente']);
    }
}
