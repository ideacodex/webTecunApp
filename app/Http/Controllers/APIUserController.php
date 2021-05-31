<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\NotificationSuggestion;
use DB;

class APIUserController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function emergencyNumer()
  {
    $authUser = auth()->user();

    if (!$authUser) {
      $data = [
        'code' => 400,
        'status' => 'error',
        'message' => 'Usuario no autenticado'
      ];
    } else {
      $arrayNumer = array(
        [
          'title' => 'Seguros La Visión',
          'body' => 
            array(
              [
                'description' => 'Cabina de Emergencia',
                'number' => '23288870'
              ],
              [
                'description' => 'Accidente de carro',
                'number' => '57840189'
              ],
            ),
        ],
        [
          'title' => 'Seguridad Industrial TECUN',
          'body' => 
            array(
              [
                'description' => 'Héctor Lucas',
                'number' => '4029-0008'
              ]
            ),
        ],
        [
          'title' => 'Seguro Médico',
          'body' => 
            array(
              [
                'description' => 'Seguro Medigo Test',
                'number' => '00000000'
              ]
            ),
        ]
      );
  
      $data = [
        'code' => 200,
        'status' => 'success',
        'arrayNumer' => $arrayNumer
      ];
    }
    
    return response()->json($data, $data['code']);
  }

  public function index()
  {
    //
    $data= Auth::user();
    $response = [
      'data' => null,
      'success' => false,
      'error' => null,
      'message' => null
    ];
    if ($data) {
      $response['success']= true;
      $response['data']= $data;
      return response()->json($response, 200);
    }
    else{
      $response['error']= 'Fallo en la autenticación';
      return response()->json($response, 403);
    }

  }

  public function selectAvatar(Request $request) 
  {
    $json = $request->input('json', null);
    $params = json_decode($json);
    $params_array = json_decode($json, true);
    $request = json_decode($json, true);
    
    DB::beginTransaction();
    try {
      if (!empty($request)) {
        //Buscaremos al ususario autenticado por medio del ID
        $idUser = auth()->user()->id;

        //Validamos que el ojecto pasado desde la APP, llegue hasta aqui
        $validate = \Validator::make($request, [
          'url_image' => 'required'
        ]);

        if($validate->fails()){
          $data = [
            'code' => 404,
            'status' => 'error',
            'message' => 'No son correctos los datos enviados, intente de nuevo'
          ];
        } else {

          $userAuth = User::find($idUser);
          $userAuth->url_image = $params_array['url_image'];
          $userAuth->save();
        }
      } else {
        DB::rollback();
        $data = [
          'code' => 400,
          'status' => 'error',
          'message' => 'Error al mandar datos vacios, intente de nuevo'
        ];
        return response()->json($data, $data['code']);
      }
      
    } catch (\Illuminate\DataBase\QueryException $e) {
      DB::rollback();
      $data = [
        'code' => 500,
        'status' => 'error',
        'message' => 'Error en la transaccion para seleccionar el avatar',
        'objectError' => $e
      ];

      return response()->json($data, $data['code']);
    }
    DB::commit();
    $data = [
      'code' => 200,
      'status' => 'success',
      'message' => 'Avatar seleccionado correctamente',
      'url_image' => auth()->user()->url_image
    ];

    return response()->json($data, $data['code']);
  }

  public function suggestions(Request $request)
  {
    DB::beginTransaction();
    try {
      //Recoger los datos por post
      //$json = $request->input('json', null);
      //$params = json_decode($json);
      //$request = json_decode($json, true);

      $user = auth()->user();

      if (($request->title != null) || ($request->description != null)) {
        if ($user) {
          $suggestions = new NotificationSuggestion;
          $suggestions->title = $request->title;
          $suggestions->description = $request->description;
          $suggestions->is_save = 1;
          $suggestions->is_suggestions = 1;
          $suggestions->is_notification = 0;
          $suggestions->user_id = $user->id;
          $suggestions->save();
  
          DB::commit();
  
          $data = [
            'code' => 200,
            'status' => 'success',
            'message' => 'Gracias por contribuir y ayudarnos a mejorar la experiencia tecun App. Información enviada. '
//            'message' => 'Tu duda o sugerencia fue enviada exitosamente, nuestro equipo lo tomara en cuenta para mejorar tu experiencia'
          ];
        } else {
          $data = [
            'code' => 400,
            'status' => 'error',
            'message' => 'Sin autenticacion'
          ];
        }
      } else {
        $data = [
          'code' => 404,
          'status' => 'error',
          'message' => 'El titulo y la descripcion son requeridos, intente de nuevo'
        ];
      }
      
    }catch (\Illuminate\Database\QueryException $e) {
      DB::rollback();
      return response()->json($e, 500);
    }
    return response()->json($data, $data['code']);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    
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
    $response = [
      'data' => null,
      'success' => false,
      'error' => null,
      'message' => null
    ];


      $users = new User;
      $users->dpi = $request->dpi;
      $users->name = $request->name;
      $users->lastname = $request->lastname;
      $users->email = $request->email;
      $users->phone = $request->phone;
      $users->password = bcrypt($request->password);
      $users->check_terms=true;
    if ($users->save()) {
      $response['success']= true;
      $response['data']= $users;
      return response()->json($response, 200);
    }
    else{
      $response['error']= 'Fallo en la autenticación';
      return response()->json($response, 500);
    }



  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
