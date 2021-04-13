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
        //Sacamos Todas las preguntas
        $question = Question::with('answer')->get();

        //Conseguimos una respuesta aleatoria
        $questionRandom = $question->random(1);

        //Encontramos las respuestas asignadas a la pregunta por medio del ID
        $answers = $questionRandom[0]->answer;

        //Sacamos solo 2 respuestas random del total que son 4
        $ansRand = $answers->random(2);

        //Sacamos las otras 2 respuestas que no son iguales a las anteriores y que tambien pueden ser random
        $ansOthers = $answers->whereNotIn('id', [$ansRand[0]->id, $ansRand[1]->id]);

        //Mandamos a la vista las respuestas individualmente
        $ansRand1 = $ansRand[0];
        $ansRand2 = $ansRand[1];
        //Mandamos a la vista las respuestas individualmente
        $data = [
            'code' => 200,
            'status' => 'success',
            'message' => 'Si entro aqui es porque es la primera vez que juega',
            'questionRandom' => $questionRandom,
            'ansRand1' => $ansRand1,
            'ansRand2' => $ansRand2,
            'ansOthers' => $ansOthers,
            'correcId' => $questionRandom[0]->answer->where('flag', 1)->first(),
        ];

        return response()->json($data, $data['code']);


    }
    

    public function scoreUser(Request $request)
    {
        $response = [
            'data' => null,
            'success' => false,
            'error' => null,
            'message' => null
          ];
          //dd($request);
        //devuelve los datos en json porque se hace el POST desde la vista de blade
        //Recogemos los datos del usuario
        $user = auth()->user();

        //Recogemos la respuesta correcta si es 1 o 0
        $flagTrue = $request->flag;

        //guardamos o aumetamos los puntos
        //Se hara la logica para aumentarle los puntos o disminuirlos
        $score = Score::find($user->score_id);
        $tempScore = $score;

        DB::beginTransaction();

        try{
            //Aumentar las respuestas correctas
            if($request->flag){
                //Aumentar las respuestas incorrectas
                $score->correct = $tempScore->correct + 1;
                $score->points = $tempScore->points + 10;
            }else{
                $score->wrong = $tempScore->wrong + 1;
            }
            $score->update();
        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($e->errorInfo[2], 500);
        }
        DB::commit();
        //Retornaremos una vista que sea mas o menos una despedida
        $response['success']= $request->flag;
        $response['data']= $score;
        return response()->json($response, 200);
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

    public function allScore()
    {
        $user = auth()->user()->score;
        $score = Score::with('user')->orderBy('points', 'DESC')->get();
        $ids=$score->get('id');
        $data = [
            'code' => 200,
            'status' => 'success',
            'allScore' => $score,
            'data' => $user,
            'ranking' => $ids,
        ];

        return response()->json($data, $data['code']);
    }
}
