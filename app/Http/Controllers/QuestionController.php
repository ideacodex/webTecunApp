<?php

namespace App\Http\Controllers;

use App\Question;
use App\Category;
use App\Status;
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

    public function question(){
        $question = Question::first();
        return view('games.question', ['question' => $question]);
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
    public function destroy(Question $question)
    {
        //
    }
}
