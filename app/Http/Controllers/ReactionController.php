<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Reaction;

use DB;

class ReactionController extends Controller
{
    public function likeOrDislikeNews(Request $request)
    {
        //Recogemos los datos del usuario
        $user = auth()->user()->id;

        //Verificar que existe el like del usuario
        $issetReactionUser = Reaction::where('user_id', $user)->count();

        //Traemos el ID del Post
        $postID = $request->type;

        //Traemos la variable Active de la reaccion
        $reactionActive = $request->active;

        DB::beginTransaction();

        try{
            if($issetReactionUser == 0){
                $reaction = new Reaction;
                $reaction->user_id = $user;
                $reaction->active = 1;
    
                //Guardar reaccion a la base de datos
                $reaction->save();
    
                $reactionID = $reaction->id;
    
                DB::table('post_reaction')->insert(['reaction_id' => $reactionID, 'post_id' => $postID]);

                DB::commit();
    
                return redirect()->action('HomeController@index')->with([
                    'message' => 'Tu reaccion a sido publicada correctamente', 
                    'alert' => 'success',
                    'reactionActive' => $reactionActive
                ]);
    
            }else{

                /*for ($i=0; $i < sizeof($request->category_id); $i++) { 

                }*/

                //Obtener el ID de la reaccion por medio de la tabla pivote
                $reactionID = DB::table('post_reaction')->where('post_id', $postID)->get('reaction_id');

                //Obtener el objecto de la reaccion dependiendo del ID obtenido por el pivote
                $reactionActive = DB::table('reactions')->where('id', $reactionID[0]->reaction_id)->get();

                //Total de likes en una noticia
                $issetReaction = $reactionActive;

                if(isset($reactionActive) && ($reactionActive[0]->active == 0)){

                    $reactionActive = DB::table('reactions')->where('id', $reactionID[0]->reaction_id)->update(['active' => 1]);

                    DB::commit();

                    return redirect()->action('HomeController@index')->with([
                        'message' => 'Tu reaccion a sido publicada correctamente', 
                        'alert' => 'success',
                        'reactionActive' => $reactionActive
                    ]);
                }else{
                    $reactionActive = DB::table('reactions')->where('id', $reactionID[0]->reaction_id)->update(['active' => 0]);

                    DB::commit();
                    
                    return redirect()->action('HomeController@index')->with([
                        'message' => 'Tu reaccion a sido quitada correctamente Del Home', 
                        'alert' => 'success',
                        'reactionActive' => $reactionActive
                    ]);
                }
            }
        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($response, 500);
        }
    }
}
