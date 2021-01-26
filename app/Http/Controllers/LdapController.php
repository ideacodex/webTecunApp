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
        
        $ldap_dn = "fmartinez@grupotecun.com";
        //$ldap_dn = "readadgt@grupotecun.com";
        //$ldap_dn = "TECUNND\\readadgt";        
        $ldap_password = "Andre@2020";
        //$ldap_password = "D3sar0ll07ecun";
        
        $ldap_con = ldap_connect("181.174.78.23");
        $ldapUserGroups = array("ElSalvador", "Guatemala", "Honduras", "Panama", "MS365" );
        //$ldapTree = "CN=Users,OU=ElSalvador,OU=Guatemala,OU=Honduras,OU=Panama,OU=MS365,DC=tc,DC=tecun,DC=net,DC=gt";
        $ldapTree = "DC=tc,DC=tecun,DC=net,DC=gt";
        //$filter="(objectClass=users)";
        $filter = "(userprincipalname=readadgt@*)";
        //$filter="(objectClass=user)";
        $field = array("cn", "sn", "givenname" ,"userprincipalname");
        //$field = array("*");
        
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        
        if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
            $result = @ldap_search($ldap_con,$ldapTree,$filter, $field);
            if($result){
                $records = ldap_get_entries($ldap_con, $result);
                dd($records[0]["givenname"][0], array_key_exists('sn', $records[0]), $records, array_key_exists('givenname', $records[0]));
            }else{
                dd("no hay resultados");
            }
            //dd ($records[0], $records[0]["displayname"][0], $records[0]["userprincipalname"]);
        } else {
            dd("Error al conectar");
            return redirect('ingresar');
        }
    }

    public function pctec(Request $request)
    {
        
        $ldap_dn = "PCTECBUS\\usertwo";
        $ldap_password = "123456Pctec";
        //"D3sar0ll07ecun";
        
        $ldap_con = ldap_connect("192.168.1.25");
        $ldapTree = "CN=users,DC=pctecbus,DC=co";
        $filter = "(userprincipalname=use*)";
        
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        
        if(ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
            $result = ldap_search($ldap_con,$ldapTree,$filter) or exit("Unable to search");
            $records = ldap_get_entries($ldap_con, $result);
            dd($records);
            dd ($records[0], $records[0]["displayname"][0], $records[0]["userprincipalname"], compact($records[0]) );
        } else {
            dd("Error al conectar");
            return redirect('ingresar');
        }
    }

    

    public function oldFunctionLdap(Request $request)
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
                    //str_shuffle("$ppT3cun$");
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

    public function ldap(Request $request)
    {
        $ldap_dn = $request->email;
        $ldap_password = $request->password;
        $ldap_con = ldap_connect("181.174.78.23");
        $ldapTree = "DC=tc,DC=tecun,DC=net,DC=gt";
        $filter = "(userprincipalname=$ldap_dn)";
        $field = array("givenname", "sn", "mail", "userprincipalname");
        
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
            //*****si conecta busca el usuario en la base de datos local y autentica
            $user = User::where('email', $request->email)->first();

            if ($user) {
                Auth::login($user);
                return redirect('home');  
            }else{
                //crea usuario en db local y luego autentica******* */
                if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
                    $result = @ldap_search($ldap_con,$ldapTree,$filter, $field);
                    if($result){
                        $records = ldap_get_entries($ldap_con, $result);
                        //dd($ldapTree, $records);
                        if (sizeOf($records) >1 ) {
                            //dd($records[0]["givenname"][0], $records);
                            if(array_key_exists('userprincipalname', $records[0])){
                                $userprincipalname=$records[0]["userprincipalname"][0];
                            };
                            if(array_key_exists('givenname', $records[0])){
                                $givenname=$records[0]["givenname"][0];
                            }else{
                                $givenname=$request->email;
                            };
                            if(array_key_exists('sn', $records[0])){
                                $sn=" " . $records[0]["sn"][0];
                            }else{
                                $sn="";
                            };
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
                                $user->name = $givenname; 
                                $user->lastname =$sn; 
                                $user->email = $request->email;
                                //str_shuffle("@ppT3cun$3cre7");
                                $user->password = bcrypt("@ppT3cun$3cre7");
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
                    }else{
                        //dd("no deberia ocurrir pero si pasa debe guardar el user sin name");
                        return redirect()->action( //regresa con el error
                            'LdapController@index')->with(['message' => 'Autenticación correcta, error tempotal del sistema', 'alert' => 'danger']);
                    }
                    //dd ($records[0], $records[0]["displayname"][0], $records[0]["userprincipalname"]);
                } else {
                    //dd("Error al conectar");
                    return redirect('ingresar')->with();
                }
            
            //return dd('algo salio mal porque si ingresó a ldap'); //hace login ldap pero no encuentra usuario en ldap o en db
            return redirect()->action( //regresa con el error
                'LdapController@index')->with(['message' => 'Autenticación correcta, error tempotal del sistema', 'alert' => 'danger']);
        
        }
            
        } else {
            return redirect()->action( //regresa con el error
                'LdapController@index')->with(['message' => 'Credenciales incorrectas, intente de nuevo', 'alert' => 'danger']);
        }
    }


    public function index()
    {
        //
        return view("ldap.login");
    }


    public function ldapApi(Request $request)
    {
        $response = [
            'data' => null,
            'success' => false,
            'error' => null,
            'message' => null
          ];
        //validamos que venga usuario y contraseña
        if (!$request->password  || !$request->email) {
            $response['success']= false;
            $response['data']= false;
            $response['message']= "Ingrese correo y contraseña";
            return response()->json($response, 500); 
        }

        $ldap_dn = $request->email;
        $ldap_password = $request->password;
        $ldap_con = ldap_connect("181.174.78.23");
        $ldapTree = "DC=tc,DC=tecun,DC=net,DC=gt";
        $filter = "(userprincipalname=$ldap_dn)";
        $field = array("givenname", "sn", "mail", "userprincipalname");
        
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap_con, LDAP_OPT_NETWORK_TIMEOUT, 8);
        if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
            //*****si conecta busca el usuario en la base de datos local y autentica
            $user = User::where('email', $request->email)->first();

            if ($user) {
                $response['success']= true;
                $response['data']= true;
                $response['message']= "Ldap ok, login en app";
                return response()->json($response, 200); 
            }else{
                //crea usuario en db local y luego autentica******* */
                if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
                    $result = @ldap_search($ldap_con,$ldapTree,$filter, $field);
                    if($result){
                        $records = ldap_get_entries($ldap_con, $result);
                        //dd($ldapTree, $records);
                        if (sizeOf($records) >1 ) {
                            //dd($records[0]["givenname"][0], $records);
                            if(array_key_exists('userprincipalname', $records[0])){
                                $userprincipalname=$records[0]["userprincipalname"][0];
                            };
                            if(array_key_exists('givenname', $records[0])){
                                $givenname=$records[0]["givenname"][0];
                            }else{
                                $givenname=$request->email;
                            };
                            if(array_key_exists('sn', $records[0])){
                                $sn=" " . $records[0]["sn"][0];
                            }else{
                                $sn="";
                            };
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
                                $user->name = $givenname; 
                                $user->lastname =$sn; 
                                $user->email = $request->email;
                                //str_shuffle("@ppT3cun$3cre7");
                                $user->password = bcrypt("@ppT3cun$3cre7");
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
                            $response['success']= true;
                            $response['data']= true;
                            $response['message']= "Ldap ok, Registro en app";
                            return response()->json($response, 200); 
                        }
                    }else{
                        //dd("no deberia ocurrir pero si pasa debe guardar el user sin name");
                        return redirect()->action( //regresa con el error
                            'LdapController@index')->with(['message' => 'Autenticación correcta, error tempotal del sistema', 'alert' => 'danger']);
                    }
                    //dd ($records[0], $records[0]["displayname"][0], $records[0]["userprincipalname"]);
                } else {
                    //dd("Error al conectar");
                    $response['success']= false;
                    $response['data']= false;
                    $response['message']= "Error al conectar";
                    $response['error']= "Error al conectar";
                    return response()->json($response, 403);
                }
            
            //return dd('algo salio mal porque si ingresó a ldap'); //hace login ldap pero no encuentra usuario en ldap o en db
            $response['success']= false;
            $response['data']= false;
            $response['message']= "Autenticación correcta, error tempotal del sistema";
            $response['error']= "Algo salio mal porque si ingresó a ldap";
            return response()->json($response, 500);
        }
            
        } else {
            $response['success']= false;
            $response['data']= false;
            $response['message']= "Credenciales incorrectas, intente de nuevo";
            $response['error']= "Credenciales incorrectas, intente de nuevo";
            return response()->json($response, 403);
            return redirect()->action( //regresa con el error
                'LdapController@index')->with(['message' => 'Credenciales incorrectas, intente de nuevo', 'alert' => 'danger']);
        }
    }
}
