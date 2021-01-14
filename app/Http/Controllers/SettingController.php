<?php

namespace App\Http\Controllers;

use App\Setting;
use DB;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settingAll = Setting::all();

        $setting = $settingAll->first();

        return view('settings.index', [
            'settingAll' => $settingAll,
            'setting' => $setting
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('settings.create');
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
            'emailRRHH' => 'required',
            'emailReports' => 'required',
            'emailWarnings' => 'required',
            'phoneSupport' => 'required',
            'phoneInfo' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $setting = new Setting;
            $setting->email_rrhh = $request->emailRRHH;
            $setting->email_reports = $request->emailReports;
            $setting->email_warnings = $request->emailWarnings;
            $setting->phone_support = $request->phoneSupport;
            $setting->phone_info = $request->phoneInfo;
            $setting->save();
            
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'SettingController@index')->with(['message' => 'Se agregó el registro correctamente', 'alert' => 'success']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $setting = Setting::find($id);
        return view('settings.edit', ['setting' => $setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'emailRRHH' => 'required',
            'emailReports' => 'required',
            'emailWarnings' => 'required',
            'phoneSupport' => 'required',
            'phoneInfo' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $setting = Setting::find($id);
            $setting->email_rrhh = $request->emailRRHH;
            $setting->email_reports = $request->emailReports;
            $setting->email_warnings = $request->emailWarnings;
            $setting->phone_support = $request->phoneSupport;
            $setting->phone_info = $request->phoneInfo;
            $setting->save();
            
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'SettingController@index')->with(['message' => 'El registro se actualizo correctamente', 'alert' => 'success']);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }


    public function panelNotifications()
    {
        //
        return view('settings.notificationsForm');
    }

    public function sendNotifications(Request $request)
    {
        //
        dd("procesar un post a expo", $request);
    }
}
