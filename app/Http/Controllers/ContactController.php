<?php

namespace App\Http\Controllers;

use App\Contact;

use DB;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::all();
        return view('contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();

        try{
            //Instanciamos el objecto
            $contact = new Contact;
            $contact->departamento = $request->departamento;
            $contact->subDepartamento = $request->subDepartamento;
            $contact->puesto = $request->puesto;
            $contact->numeroDirecto = $request->numeroDirecto;
            $contact->celular = $request->celular;
            $contact->extension = $request->extension;
            $contact->asistente = $request->asistente;
            $contact->extensionAsistente = $request->extensionAsistente;
            $contact->correo = $request->correo;
            $contact->pais = $request->pais;
            $contact->empresa = $request->empresa;
            $contact->comentarios = $request->comentarios;
            $contact->mailGeneral = $request->mailGeneral;

            //Inicializamos las variables obteniendo los datos de la request
            $nombre = $request->nombre;
            $apellido = $request->apellido;

            //Concatenamos las 2 variables para seguir el orden en la BD
            $nombreDB = $apellido.", ".$nombre;

            //Guardamos el valor resultante de la contactenacion
            $contact->nombre = $nombreDB;

            $contact->save();
        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
            return redirect()->action('ContactController@create')
                    ->with(['message' => 'Error al crear el contacto', 'alert' => 'warning']);

        }

        DB::commit();

        return redirect()->action('ContactController@index')
            ->with(['message' => 'Contacto creado con exito', 'alert' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $contact = Contact::findOrFails($id);
        return view('contacts.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contact = Contact::find($id);
        return view('contacts.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        DB::beginTransaction();

        try{
            //Instanciamos el objecto
            $contact = Contact::find($id);
            $contact->departamento = $request->departamento;
            $contact->subDepartamento = $request->subDepartamento;
            $contact->puesto = $request->puesto;
            $contact->numeroDirecto = $request->numeroDirecto;
            $contact->celular = $request->celular;
            $contact->extension = $request->extension;
            $contact->asistente = $request->asistente;
            $contact->extensionAsistente = $request->extensionAsistente;
            $contact->correo = $request->correo;
            $contact->pais = $request->pais;
            $contact->empresa = $request->empresa;
            $contact->comentarios = $request->comentarios;
            $contact->mailGeneral = $request->mailGeneral;
            $contact->nombre = $request->nombre;

            $contact->save();
        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
            return redirect()->action('ContactController@create')
                    ->with(['message' => 'Error al crear el contacto', 'alert' => 'warning']);

        }

        DB::commit();

        return redirect()->action('ContactController@index')
            ->with(['message' => 'Contacto creado con exito', 'alert' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->action('ContactController@index')
            ->with(['message' => 'Contacto eliminado correctamente', 'alert' => 'warning']);
    }

    public function contactsUserForm()
    {
        //$contacts = Contact::take(10)->get();

        return view('contacts.home', [
            'contacts' => null
        ]);
    }

    public function contactsUser(Request $request)
    {
        $nombre = $request->get('searchNombre');
        $departamento = $request->get('searchDepartamento');
        $pais = $request->get('searchPais');
        $puesto = $request->get('searchPuesto');
        $contacts = Contact::where('nombre', 'LIKE', "%$nombre%")
                    ->where('departamento', 'LIKE', "%$departamento%")
                    ->where('pais', 'LIKE', "%$pais%")
                    ->where('puesto', 'LIKE', "%$puesto%")
                    ->take(10)
                    ->get();

        return view('contacts.home', [
            'contacts' => $contacts
        ]);
    }

    public function ContactUser($id)
    {
        $contact = Contact::findOrFails($id);
        return view('contacts.show', ['contact' => $contact]);
    }
}
