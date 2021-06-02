<?php

namespace App\Http\Controllers;

use App\Setting;
use App\UsersDevice;
USE App\NotificationSuggestion;
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
        //formulario web para envio de notificaciones
        return view('settings.notificationsForm');
    }

    public function sendNotifications(Request $request)
    {
        /* Mi codigo: Guardar en base de datos */
        DB::beginTransaction();
        try {
            $notification = new NotificationSuggestion;
            $notification->title = $request->title;
            $notification->description = $request->message;
            $notification->is_suggestions = 0;
            $notification->is_notification = 1;
            if (isset($request->isSave) && $request->isSave) {
                $notification->is_save = 1;
            } else {
                $notification->is_save = 0;
            }
            $notification->save();
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            abort(500, $e->errorInfo[2]);
        }
        DB::commit();

        /* Mi codigo: Guardar en base de datos */
        //recibe formulariode la web, consulta en base de datos loas token de push notifications, y envia la peticion post con el json a el api de expo push notificatiosn
        $body=array();
        $devices=UsersDevice::get('token');
        foreach ($devices as $record) {
            // Setup request to send json via POST
            $data = array(
                'to' => $record->token,
                'title' => $request->title,
                'body' => $request->message,
            );
            array_push($body, $data);
        }
        // API URL
        $url = 'https://exp.host/--/api/v2/push/send';

        // Create a new cURL resource
        $ch = curl_init($url);

        
        $payload = json_encode($body);

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the POST request
        $result = curl_exec($ch);

        // Close cURL resource
        curl_close($ch);
        //************************** */
        return \Redirect::back()->with([
            'message' => 'se enviarion las notificaciones',
            'alert' => 'success'
        ]);
        dd("envia notificaciones", $request, $devices, $result);
    }

    public function saveNotificationToken(Request $request)
    {
        $response = [
            'data' => null,
            'success' => false,
            'error' => null,
            'message' => null
          ];
        //Guardar los token de push notifications
        $data=UsersDevice::where('token', $request->token)->first();
        if($data){
            $data->token=$request->token;
            $data->user_id=$request->user_id;
            $data->save();
            $response['message']= "se actualizó el token";
        }else{
            $data= new UsersDevice();
            $data->token=$request->token;
            $data->user_id=$request->user_id;
            $data->save();
            $response['message']= "se guardó el token";
        }
        $response['success']= true;
        $response['data']= true;
        
        return response()->json($response, 200);
    }
}
