<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Score;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }
 /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function findUsername()
    {
        $login = request()->input('email');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }
 
    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }


    //validar ldap
    protected function credentials(Request $request) {
        $aproved=0;
        $email = $request->input('email');
        $password = $request->input('password');
        //datos del server ldap
        $ldap_host = "ldap.forumsys.com";   // your ldap servers
        $ldap_port = 389;          // your ldap server's port number
        $ldap_dn = "uid=".$email.",dc=example,dc=com";
        $ldap_password = $password;
        // Connecting to LDAP
        $ldap_con = ldap_connect( $ldap_host, $ldap_port) or 
        exit(">>Could not connect to LDAP server<<");
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)){
            $user=User::where('email', $email.'@tecun.com')->first();
            if ($user) {
                $user->ldap=1;
                $user->password = bcrypt($password);
                $user->save();
            }else{
                $score = new Score;
                $score->points = 0;
                $score->wrong = 0;
                $score->correct = 0;
                $score->save();
                
                $user=new User();
                $user->name=$email;
                $user->email=$email.'@tecun.com';
                $user->password = bcrypt($password);
                $user->ldap=1;
                $user->role_id = 4;
                $user->status_id = 1;
                $user->save();
                $user->syncRoles(['User']);
            }
        } else {
            //echo "Invalid user/pass or other errors!";
            //no deberia logear 
            $aproved=0;
        }
        //termina ldap
        return ['email' => $email.'@tecun.com', 'password' => $password, 'ldap' => 1];
    }
}
