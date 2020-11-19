<?php

namespace App\Http\Controllers;

use App\Question;
use App\passingFlag;
use App\Category;
use App\Status;

use App\Score;

use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question = Question::all();
        return view('games.index', ['question' => $question]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $question = Question::all();
        $status = Status::all();
        $categories = Category::all();
        return view('games.create', ['status' => $status, 'categories' => $categories, 'question' => $question]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        request()->validate([
            '_token' => 'required',
            'description' => 'required',
            'image' => 'required',
            'questionTrue' => 'required',
            'questionFalse1' => 'required',
            'questionFalse2' => 'required',
            'questionFalse3' => 'required',
        ]);
        DB::beginTransaction();
        try{
            $question = new Question;
            $question->description = $request->description;
            $question->questionTrue = $request->questionTrue;
            $question->questionFalse1 = $request->questionFalse1;
            $question->questionFalse2 = $request->questionFalse2;
            $question->questionFalse3 = $request->questionFalse3;
            $question->user_id = auth()->user()->id;
            $question->save();

             //******carga de imagen**********//
             if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageNameToStore = $question->id . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('image')->storeAs('public/questions', $imageNameToStore);
                //dd($path);

                $question->url_image = $imageNameToStore;
                $question->save();
            }
            //******carga de imagen**********//
        } catch(\Illuminate\Database\QueryException $e){
            DB::rollback(); //En caso de haber un error, los cambios realizados se desacen y muestra error
            abort(500, $e->errorInfo[2]); //Dicho error esta en la posicion 2 del arr
            return response()->json($response, 500);
        }

        DB::commit();
        return redirect()->action('QuestionController@index')
                         ->with(['message' => 'Se agrego un registro correctamente', 'alert' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $question = Question::findOrFail($id);
        return view('/*Vista del usuario*/', ['question' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $categories = Category::all();
        $status = Status::all();
        return view('games.edit', ['status' => $status, 'categories' => $categories, 'question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        request()->validate([
            'description' => 'required',
            'image' => 'required',
            'questionTrue' => 'required',
            'questionFalse1' => 'required',
            'questionFalse2' => 'required',
            'questionFalse3' => 'required'
        ]);

        DB::beginTransaction();
        try{
            $question = new Question;
            $question->description = $request->description;
            $question->image = $request->image;
            $question->questionTrue = $request->questionTrue;
            $question->questionFalse1 = $request->questionFalse1;
            $question->questionFalse2 = $request->questionFalse2;
            $question->questionFalse3 = $request->questionFalse3;
            $question->user_id = auth()->user()->id;
            $question->update();
        } catch(\Illuminate\Database\QueryException $e){
            DB::rollback();
            abort(500, $e->infoError[2]);
            return response()->json($response, 500);
        }

        DB::commit();
        return redirect()->action('QuestionController@index')
                         ->with(['message' => 'Registro actualizado correctamente', 'alert' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $record = Question::find($id);
        $record->delete();

        return redirect()->action('QuestionController@index')
                    ->with(['message' => 'Registro eliminado correctamente', 'alert' => 'danger']);
    }

    public function question()
    {
        //Recogemos los datos del usuario
        $user = auth()->user();
        $user_id = $user->id;

        //Validamos si el usuario ya existe en la base de datos de Flag
        $isset = passingFlag::where('user_id', $user_id)->count();

        //Sacamos una pregunta aleatoria
        $questionAll = Question::all();
        $questionRandom = $questionAll->random(1);

        //Validamos si el usuario no existe
        if($isset == 0){
            //retornamos la vista con la unica pregunta random
            return view('games.question', [
                'questionRandom' => $questionRandom
            ]);

        }else{
            //Si el flujo llega hasta aqui
            //Sacamos los datos del usuario que estan en la tabla de Flag
            $uniquedObject = passingFlag::where('user_id', $user_id)->first();

            //Sacamos el valor que tiene status de dicha tabla
            $status = $uniquedObject->status;

            //Validamos si ya llego al estado F o Finalizado
            if($status == 'F'){
                //Asignaremos las preguntas correctas al modelo User
                $corrects = $uniquedObject->questionTrue; 

                //Se hara la logica para aumentarle los puntos o disminuirlos
                $score = Score::find($user->score_id);
                $tempScore = $score;

                DB::beginTransaction();

                try{
                    //Aumentar las respuestas correctas
                    $score->correct = $tempScore->correct + $corrects;

                    if($corrects <= 2){
                        //Aumentar las respuestas incorrectas
                        $score->wrong = $tempScore->wrong + (3 - $corrects);
                    }

                    $score->points = $score->correct * 10;

                    unset($score->id);

                    $score->update();

                }catch (\Illuminate\Database\QueryException $e) {
                    DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                        //$response['message'] = $e->errorInfo;
                        //dd($e->errorInfo[2]);
                        abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                        return response()->json($response, 500);
                }

                DB::commit();

                //Eliminamos el registro de la tabla Flag
                $uniquedObject->delete();

                //Retornaremos una vista que sea mas o menos una despedida
                return redirect()->action('QuestionController@question');
            }else{
                //Retornamos una vista con una pregunta Random
                return view('games.question', [
                    'questionRandom' => $questionRandom
                ]);
            }
            
        }


    }

    public function storeUser(Request $request)
    {
        //Inicializamos la variables a utilizar
        $Z = 'Z';
        $I = 'I';
        $M = 'M';
        $F = 'F';

        //Recogemos los datos del usuario
        $user_id = auth()->user()->id;

        //Recogemos la variable item del form que es valor inicializado a 1
        $item = $request->item;

        //Recogemos el ID de la question
        $question_id = $request->questionID;

        //Recogemos la respuesta correcta si existiera o fuera seleccionada
        $questionTrue = $request->questionTrue;

        //Verificamos si el usuario existe en la DB;
        $isset = passingFlag::where('user_id', $user_id)->count();

        DB::beginTransaction();

        try{
            if($isset == 0){
                //Instanciamos el objecto nuevo
                $flag = new passingFlag;
                $flag->status = $Z;
                $flag->passed = $item;
                $flag->user_id = $user_id;
                $flag->question_id = $question_id;

                //Si existe y no es nulo la request de questionTrue, es porque el usuario
                //Selecciono la respuesta correcta, de lo contrario se asigna como valor 0
                if(isset($questionTrue) && !is_null($questionTrue)){
                    $flag->questionTrue = $item;
                }else{
                    $flag->questiontrue = 0;
                }

                //Se guarda el objecto nuevo
                $flag->save();
            }else{
                //Si el usuario ya existe en la base de datos recogemos el ID de la tabla
                $idArray = passingFlag::where('user_id', $user_id)->get('id');

                //Lo decodificamos para sacar unicamente el valor de ID
                $id = json_decode($idArray, true);

                //Con el ID decodificado sacamos el objecto
                $uniquedObject = passingFlag::where('id', $id)->first();

                $passed = $uniquedObject->passed;

                //Utilizamos la condicional if para ver cuantas veces a entrado el usuario a jugar para actualizarlo
                if($uniquedObject->status == 'X'){
                    dd('Llegaste a tu tercer juego', $uniquedObject);
                }else{
                    $passedMore = $uniquedObject->passed;
                    $trueQuestion = $uniquedObject->questionTrue;

                    $uniquedObject->passed = $passedMore + $item;
                    $uniquedObject->question_id = $question_id;

                    if(isset($questionTrue) && !is_null($questionTrue)){
                        $uniquedObject->questionTrue = $trueQuestion + $item;
                    }else{
                        unset($uniquedObject->questionTrue);
                    }

                    if($uniquedObject->status == 'I'){
                        $uniquedObject->status = $M;
                    }

                    if($uniquedObject->status == 'Z'){
                        $uniquedObject->status = $I;
                    }

                    if($uniquedObject->status == 'M'){
                        $uniquedObject->status = $F;
                    }


                    unset($uniquedObject->id);
                    unset($uniquedObject->user_id);

                    $uniquedObject->update();
                }
                
            }

        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($response, 500);
        }

        DB::commit();
        return redirect()->action('QuestionController@question');
    }
}