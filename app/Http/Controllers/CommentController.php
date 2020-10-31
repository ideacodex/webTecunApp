<?php

namespace App\Http\Controllers;

use App\Comment;

use DB;

use App\Http\Controllers\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CommentController extends Controller
{
    public function save(Request $request)
    {
        //Validamos que los datos sean los correctos
        request()->validate([
            'comment' => 'required'
        ]);

        DB::beginTransaction();

        try{

            //Recogemos los datos
            $comment = new Comment;
            $comment->user_id = auth()->user()->id;
            $comment->message = $request->comment;

            $postId = $request->postId;

            //Guardamos los datos en la DB
            $comment->save();

            //Insertamos los ID's en la tabla pivote
            DB::table('comment_post')->insert(['comment_id' => $comment->id, 'post_id' => $postId]);            

        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
            return redirect('/')->with(['message' => 'No se a publicado tu comentario', 'alert' => 'warning']);
        }

        DB::commit();

        return \Redirect::back()->with(['message' => 'Haz publicado tu comentario correctamente', 'alert' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Conseguimos los datos del usuario identificado
        $user = auth()->user()->id;

        //Conseguimos el comentario como tal
        $comment = Comment::find($id);

        DB::beginTransaction();

        try{

            //Validamos los datos
            if(isset($user) && $comment->user_id == $user->id){

                DB::table('comment_post')->where('comment_id', $comment->id)->delete();

                $comment->delete();
            }else{
                return \Redirect::back()->with(['message' => 'No puedes eliminar este comentario', 'alert' => 'danger']);
            }

        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
            return \Redirect::back()->with(['message' => 'Error al eliminar el comentario', 'alert' => 'warning']);
        }

        DB::commit();

        return \Redirect::back()->with(['message' => 'Comentario eliminado exitosamente', 'alert' => 'success']);
    }
}
