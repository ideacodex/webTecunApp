<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Score;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'dpi' => ['required', 'integer', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'integer', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //
        DB::beginTransaction();
        try {
            $score = new Score;
            $score->points = 0;
            $score->wrong = 0;
            $score->correct = 0;
            $score->save();
            if (!Role::find(1)) { //si no existen roles en la base de datos, crea los roles
                $roleSuper = Role::create(['name' => 'root']);
                $roleAdmin = Role::create(['name' => 'Super']);
                $roleSeller = Role::create(['name' => 'Admin']);
                $roleFinal = Role::create(['name' => 'User']);
            }
            $request = new Request($data);
            //************correo paraadmin cuando se registra un usuario**************
            /*Mail::to([$request->email])
        ->cc('norellanac@miumg.edu.gt') // enviar correo con copia
        ->send(new welcomeUser($request)); //envia la variables $request a la clase de MAIL.ContactPage
        //email al correo ingresado al formulario para informar que recibimos su consulta*/
        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit(); //si llega a este punto **FINALILA LA TRANSACCION y guarda en base de datos
        
        $user= User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'dpi' => $data['dpi'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'check_terms' => true,
            'url_image' => 'users/default_profile.png',
            'role_id' => 4, //aca se asigana el id de la tabla roles numero "id=3 name=User"
            'status_id' => 3,
            'score_id'=>$score->id,
        ]);

        return $user;
    }
}
