<?php

namespace App\Http\Controllers;

use App\Question;
use App\passingFlag;
use App\Category;
use App\Status;
use App\Score;
use App\Answer;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class APIGamesController extends Controller
{
    //
    public function question()
    {
        //Recogemos los datos del usuario
        $user = auth()->user();
        $user_id = $user->id;

        //Validamos si el usuario ya existe en la base de datos de Flag
        $isset = passingFlag::where('user_id', $user_id)->count();

        //Sacamos Todas las preguntas
        $question = Question::all();

        //Conseguimos una respuesta aleatoria
        $questionRandom = $question->random(1);

        //Encontramos las respuestas asignadas a la pregunta por medio del ID
        $answers = Answer::where('question_id', $questionRandom[0]->id)->get();

        //Sacamos solo 2 respuestas random del total que son 4
        $ansRand = $answers->random(2);

        //Sacamos las otras 2 respuestas que no son iguales a las anteriores y que tambien pueden ser random
        $ansOthers = $answers->whereNotIn('id', [$ansRand[0]->id, $ansRand[1]->id]);

        //Mandamos a la vista las respuestas individualmente
        $ansRand1 = $ansRand[0];
        $ansRand2 = $ansRand[1];
        //Mandamos a la vista las respuestas individualmente

        //Validamos si el usuario no existe
        if($isset == 0){
            //retornamos la vista con la unica pregunta random

            $data = [
                'code' => 200,
                'status' => 'success',
                'message' => 'Si entro aqui es porque es la primera vez que juega',
                'questionRandom' => $questionRandom,
                'ansRand1' => $ansRand1,
                'ansRand2' => $ansRand2,
                'ansOthers' => $ansOthers
            ];

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

                    //Aumentamos el puntaje total del usuario
                    $score->points = $score->correct * 10;

                    //No actualizamos el ID del punteo
                    unset($score->id);

                    //Actualizamos las valores
                    $score->update();

                    $tempScore->correct = $corrects;
                    $questionTrue = $tempScore->correct;

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

                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Si entro aqui es porque llego a sus 3 juegos completos',
                    'questionTrue' => $questionTrue
                ];
            }else{
                //Retornamos una vista con una pregunta Random

                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'si llego aqui es porque aun no a terminado sus 3 juegos',
                    'questionRandom' => $questionRandom,
                    'ansRand1' => $ansRand1,
                    'ansRand2' => $ansRand2,
                    'ansOthers' => $ansOthers
                ];
            }
            
        }

        return response()->json($data, $data['code']);
    }

    public function scoreUser(Request $request)
    {
        //Recoger los datos por post
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        //Inicializamos la variables a utilizar
        $Z = 'Z';
        $I = 'I';
        $M = 'M';
        $F = 'F';

        //Recogemos los datos del usuario
        $user_id = auth()->user()->id;

        //Recogemos la variable item del form que es valor inicializado a 1
        $item = $params->item;

        //Recogemos el ID de la question
        $question_id = $params->questionID;

        //Recogemos la respuesta correcta si es 1 o 0
        $flagTrue = $params->flag;

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

                //Si existe y no es nulo la params de questionTrue, es porque el usuario $params->flag === 1
                //Selecciono la respuesta correcta, de lo contrario se asigna como valor 0
                if($flagTrue == 1){
                    $flag->questionTrue = $item;
                }else{
                    $flag->questiontrue = 0;
                }

                //Se guarda el objecto nuevo
                $flag->save();

                DB::commit();

                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Si llego aqui, es su primera respuesta',
                    'uniquedObject' => $flag
                ];
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
                    //Los ultimos valores de la tabla, las almacenamos en variables
                    $passedMore = $uniquedObject->passed;
                    $trueQuestion = $uniquedObject->questionTrue;

                    //Los nuevos registros de la tabla, le sumamos los nuevos valores
                    //con los almacenados en las variables en el paso anterior
                    $uniquedObject->passed = $passedMore + $item;

                    //Sacamos el nuevo ID de la pregunta
                    $uniquedObject->question_id = $question_id;

                    //Si existe y no es nulo la params de questionTrue, es porque el usuario
                    //Selecciono la respuesta correcta, sumamos 1 mas al registro anterior y lo almacenamos
                    if($flagTrue == 1){
                        $uniquedObject->questionTrue = $trueQuestion + $item;
                    }else{
                        //De lo contrario, no se actualizara
                        //unset($uniquedObject->questionTrue);
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

                    $uniquedObject->save();

                    DB::commit();

                    $data = [
                        'code' => 200,
                        'status' => 'success',
                        'message' => 'Si llego aqui, esta en su 2 o 3 respuesta actualizada',
                        'uniquedObject' => $uniquedObject
                    ];
                }
                
            }

        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($response, 500);
        }

        return response()->json($data, $data['code']);

    }

    public function score()
    {
        $score = Score::with('user')->orderBy('points', 'DESC')->limit(5)->get();
        
        $data = [
            'code' => 200,
            'status' => 'success',
            'score' => $score
        ];

        return response()->json($data, $data['code']);
    }
}
