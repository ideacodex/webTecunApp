<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class APIUserController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
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
