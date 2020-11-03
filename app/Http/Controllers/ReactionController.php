<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Reaction;

use DB;

class ReactionController extends Controller
{
    public function likeOrDislike(Request $request)
    {
        //Recogemos los datos del usuario
        $user = auth()->user()->id;

        //Verificar que existe el like
        $issetReaction = Reaction::where('user_id', $user)->count();

        if($issetReaction == 0){
            $reaction = new Reaction;
            $reaction->user_id = $user;
            $reaction->active = $request->active;

            //Guardar reaccion a la base de datos
            $reaction->save();

            $reactionID = $reaction->id;

            $reactionActive = 1;

            return \Redirect::back()->with([
                'message' => 'Tu reaccion a sido publicada correctamente', 
                'alert' => 'success',
                'reactionID' => $reactionID,
                'reactionActive' => $reactionActive
            ]);

        }else{
            $reaction = Reaction::find($id)->delete();

            return \Redirect::back()->with(['message' => 'Tu reaccion a sido quitada correctamente', 'alert' => 'success']);
        }
    }
}
