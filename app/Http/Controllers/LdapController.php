<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Score;
use App\User;
use DB;

class LdapController extends Controller
{
    //

    public function test(Request $request)
    {
        
        $ldap_dn = "TECUNND\\". $request->email;
        $ldap_password = $request->password;
        //"D3sar0ll07ecun";
        
        $ldap_con = ldap_connect("181.174.78.23");
        $ldapTree = "CN=Users,DC=tc,DC=tecun,DC=net,DC=gt";
        $filter = "(cn=". $request->email . "*)";
        
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        
        if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
            $result = ldap_search($ldap_con,$ldapTree,$filter) or exit("Unable to search");
            $records = ldap_get_entries($ldap_con, $result);
            dd ($records[0], $records[0]["displayname"], $records[0]["userprincipalname"] );
        } else {
            return redirect('ingresar');
        }
    }

    public function ldap(Request $request)
    {
        
        $ldap_dn = "TECUNND\\". $request->email;
        $ldap_password = $request->password;
        //"D3sar0ll07ecun";
        
        $ldap_con = ldap_connect("181.174.78.23");
        $ldapTree = "CN=Users,DC=tc,DC=tecun,DC=net,DC=gt";
        $filter = "(cn=". $request->email . "*)";
        
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        
        if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
            $result = ldap_search($ldap_con,$ldapTree,$filter) or exit("Unable to search");
            $records = ldap_get_entries($ldap_con, $result);
            
            if (sizeOf($records)) {
                request()->validate([
                    'dpi' => 'unique:users',
                    'email' => 'required|unique:users',
                    'phone' => 'unique:users',
                    'password' => 'required',
                ]);
        
                DB::beginTransaction();
                try {
                    //encontrar y asignar rol de Spatie
                    $roleName = Role::find(4); //obtiene el roll desde la base de datos
        
                    $score = new Score;
                    $score->points = 0;
                    $score->wrong = 0;
                    $score->correct = 0;
                    $score->save();
        
                    $user = new User;
                    $user->name = "readadgt"; 
                    $user->lastname = $request->lastname;
                    $user->email = $request->email;
                    $user->phone = $request->phone;
                    $user->password = bcrypt($request->password);
                    $user->role_id = 4;
                    $user->status_id = 1;
                    $user->score_id = $score->id;
                    $user->save();
                    $user->syncRoles([$roleName->name]);
                } catch (\Illuminate\Database\QueryException $e) {
                    DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                    //$response['message'] = $e->errorInfo;
                    //dd($e->errorInfo[2]);
                    abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                    return response()->json($response, 500);
                }
                DB::commit();
                Auth::login($user);
                return redirect()->action( //regresa con el error
                    'UserController@index')->with(['message' => 'Se agregó el registro correctamente', 'alert' => 'warning']);
            }
            dd ($records[0], $records[0]["displayname"], $records[0]["userprincipalname"] );
        } else {
            return redirect('ingresar');
        }
    }


    public function index()
    {
        //
        return view("ldap.login");
    }


    public function store(Request $request)
    {
        //
        request()->validate([
            'dpi' => 'unique:users',
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'unique:users',
            'password' => 'required',
            'role_id' => 'required',
            'status_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            //encontrar y asignar rol de Spatie
            $roleName = Role::find($request->role_id); //obtiene el roll desde la base de datos

            $score = new Score;
            $score->points = 0;
            $score->wrong = 0;
            $score->correct = 0;
            $score->save();

            $users = new User;
            $users->dpi = $request->dpi;
            $users->name = $request->name;
            $users->lastname = $request->lastname;
            $users->email = $request->email;
            $users->phone = $request->phone;
            $users->password = bcrypt($request->password);
            $users->role_id = $request->role_id;
            $users->status_id = $request->status_id;
            $users->score_id = $score->id;
            $users->save();
            $users->syncRoles([$roleName->name]);
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'UserController@index')->with(['message' => 'Se agregó el registro correctamente', 'alert' => 'warning']);
    }
}
