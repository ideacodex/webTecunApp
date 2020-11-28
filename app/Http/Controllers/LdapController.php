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
        
        $ldap_dn = "TECUNND\\readadgt";
        $ldap_password = "D3sar0ll07ecun";
        //"D3sar0ll07ecun";
        
        $ldap_con = ldap_connect("181.174.78.23");
        $ldapTree = "CN=Users,DC=tc,DC=tecun,DC=net,DC=gt";
        $filter = "(cn=readadgt)";
        
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        
        if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
            $result = ldap_search($ldap_con,$ldapTree,$filter) or exit("Unable to search");
            $records = ldap_get_entries($ldap_con, $result);
            dd ($records[0], $records[0]["displayname"][0], $records[0]["userprincipalname"]);
        } else {
            dd("Error al conectar");
            return redirect('ingresar');
        }
    }

    public function pctec(Request $request)
    {
        
        $ldap_dn = "PCTECBUS\\userone";
        $ldap_password = "12345Soporte";
        //"D3sar0ll07ecun";
        
        $ldap_con = ldap_connect("192.168.1.25");
        $ldapTree = "CN=users,DC=pctecbus,DC=co";
        $filter = "(userprincipalname=use*)";
        
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        
        if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
            $result = ldap_search($ldap_con,$ldapTree,$filter) or exit("Unable to search");
            $records = ldap_get_entries($ldap_con, $result);
            dd($records);
            dd ($records[0], $records[0]["displayname"][0], $records[0]["userprincipalname"], compact($records[0]) );
        } else {
            dd("Error al conectar");
            return redirect('ingresar');
        }
    }

    

    public function ldap(Request $request)
    {
        //eliminamos el dominio del correo para tener el user
        $indexChar=strpos($request->email,"@"); //obtenemos la posicion del sigo @
        $userLdap=substr($request->email,0,$indexChar); //luego un subcadena desde 0 hasta indexChar
        $ldap_dn = "TECUNND\\". $userLdap;
        $ldap_password = $request->password;
        $ldap_con = ldap_connect("181.174.78.23");
        $ldapTree = "CN=Users,DC=tc,DC=tecun,DC=net,DC=gt"; //Parametros de busqueda en arboles LDAP
        $filter = "(userprincipalname=". $request->email . "*)"; //campo a buscar en activeDirectory
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
            //*****si conecta busca el usuario en la base de datos local y autentica
            $user = User::where('email', 'LIKE', "$userLdap@%")->first();

            if ($user) {
                Auth::login($user);
                return redirect('home');  
            }else{
                //crea usuario en db local y luego autentica******* */
                $result = ldap_search($ldap_con,$ldapTree,$filter) or exit("Unable to search");
                $records = ldap_get_entries($ldap_con, $result);
            
            if (sizeOf($records) >1 ) {
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
                    $user->name = $records[0]["displayname"][0]; 
                    $user->email = $request->email;
                    //str_shuffle("$ppT3cun$2020");
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
                return redirect('home');  
               //dd ($records[0], $records[0]["displayname"], $records[0]["userprincipalname"] );
               

            }
            return redirect('ingresar'); //hace login ldap pero no encuentra usuario en ldap o en db
        }
            
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
