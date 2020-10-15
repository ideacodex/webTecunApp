<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Status;
use DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view("posts.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $status = Status::all();
        $categories = Category::all();
        return view("posts.create", ["status" => $status, "categories" => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request['article-trixFields']['content']);
        request()->validate([
            '_token' => 'required',
            'description' => 'required',
            'type_id' => 'required',
            'status_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            //******carga de imagen**********//
            if ($request->hasFile('image')) {
                $filename = $request->_token;
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageNameToStore = $request->_token . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('image')->storeAs('public/posts', $imageNameToStore);
                //dd($path);
            } else {
                $imageNameToStore = 'no_image.jpg';
            }
            //******carga de imagen**********//

            //******carga de audio**********//
            if ($request->hasFile('audio')) {
                $filename = $request->_token;
                $extension = $request->file('audio')->getClientOriginalExtension();
                $audioNameToStore = $request->_token . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('audio')->storeAs('public/posts', $audioNameToStore);
                //dd($path);
            } else {
                $audioNameToStore = 'no_audio.jpg';
            }
            //******carga de audio**********//

            //******carga de video**********//
            if ($request->hasFile('video')) {
                $filename = $request->_token;
                $extension = $request->file('video')->getClientOriginalExtension();
                $videoNameToStore = $request->_token . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('video')->storeAs('public/posts', $videoNameToStore);
                //dd($path);
            } else {
                $videoNameToStore = 'no_video.jpg';
            }
            //******carga de video**********//

            //******carga de file**********//
            if ($request->hasFile('pdf')) {
                $filename = $request->_token;
                $extension = $request->file('pdf')->getClientOriginalExtension();
                $pdfNameToStore = $request->_token . '.' . $extension;
                // Upload Image //********nombre de carpeta para almacenar*****
                $path = $request->file('pdf')->storeAs('public/posts', $pdfNameToStore);
                //dd($path);
            } else {
                $pdfNameToStore = 'nofile';
            }
            //******carga de file**********//
            //encontrar y asignar rol de Spatie
            $post = new Post;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->type_id = $request->type_id;
            $post->content = $request->editordata;
            $post->featured_image = '10';
            $post->featured_video = '10';
            $post->featured_audio = '10';
            //$post->featured_document = $request->featured_document;
            //$post->save();
            $post->user_id = auth()->user()->id;
            $post->status_id = $request->status_id;
            $post->save();            
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
            //$response['message'] = $e->errorInfo;
            //dd($e->errorInfo[2]);
            abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
            return response()->json($response, 500);
        }
        DB::commit();
        return redirect()->action( //regresa con el error
            'PostController@index')->with(['message' => 'Se agregó el registro correctamente', 'alert' => 'warning']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $posts = Post::findOrFail($id);
        return view("posts.show", ["posts" => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = Status::all();
        $record = Post::findOrFail($id);
        $categories = Category::all();
        return view("posts.edit", ["status" => $status, "categories" => $categories, "record" => $record ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            //dd($request['article-trixFields']['content']);
            /*request()->validate([
                'title' => 'required',
                'description' => 'required',
                'type_id' => 'required',
                'status_id' => 'required',
                'content' => 'required',
                ''
            ]);*/
            //dd($request);
            DB::beginTransaction();
            try {
                //******carga de imagen**********//
                if ($request->hasFile('image')) {
                    $filename = $request->_token;
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $imageNameToStore = $request->_token . '.' . $extension;
                    // Upload Image //********nombre de carpeta para almacenar*****
                    $path = $request->file('image')->storeAs('public/posts', $imageNameToStore);
                    //dd($path);
                } else {
                    $imageNameToStore = 'no_image.jpg';
                }
                //******carga de imagen**********//
    
                //******carga de audio**********//
                if ($request->hasFile('audio')) {
                    $filename = $request->_token;
                    $extension = $request->file('audio')->getClientOriginalExtension();
                    $audioNameToStore = $request->_token . '.' . $extension;
                    // Upload Image //********nombre de carpeta para almacenar*****
                    $path = $request->file('audio')->storeAs('public/posts', $audioNameToStore);
                    //dd($path);
                } else {
                    $audioNameToStore = 'no_audio.jpg';
                }
                //******carga de audio**********//
    
                //******carga de video**********//
                if ($request->hasFile('video')) {
                    $filename = $request->_token;
                    $extension = $request->file('video')->getClientOriginalExtension();
                    $videoNameToStore = $request->_token . '.' . $extension;
                    // Upload Image //********nombre de carpeta para almacenar*****
                    $path = $request->file('video')->storeAs('public/posts', $videoNameToStore);
                    //dd($path);
                } else {
                    $videoNameToStore = 'no_video.jpg';
                }
                //******carga de video**********//
    
                //******carga de file**********//
                if ($request->hasFile('pdf')) {
                    $filename = $request->_token;
                    $extension = $request->file('pdf')->getClientOriginalExtension();
                    $pdfNameToStore = $request->_token . '.' . $extension;
                    // Upload Image //********nombre de carpeta para almacenar*****
                    $path = $request->file('pdf')->storeAs('public/posts', $pdfNameToStore);
                    //dd($path);
                } else {
                    $pdfNameToStore = 'nofile';
                }
                //******carga de file**********//

                //encontrar y asignar rol de Spatie
                $post = Post::findOrFail($id);
                $post->title = $request->title;
                $post->description = $request->description;
                $post['attachment-post-trixFields'] = $request['attachment-article-trixFields'];
                $post->type_id = $request->type_id;
                $post->content = $request->editordata;
                $post['post-trixFields'] = $request['article-trixFields'];
                $post->featured_image = '10';
                $post->featured_video = '10';
                $post->featured_audio = '10';
                //$post->featured_document = $request->featured_document;
                //$post->save();
                $post->user_id = auth()->user()->id;
                $post->status_id = $request->status_id;
                $post->save();

            } catch (\Illuminate\Database\QueryException $e) {
                DB::rollback(); //si hay un error previo, desahe los cambios en DB y redirecciona a pagina de error
                //$response['message'] = $e->errorInfo;
                //dd($e->errorInfo[2]);
                abort(500, $e->errorInfo[2]); //en la poscision 2 del array está el mensaje
                return response()->json($response, 500);
            }
            DB::commit();
            return redirect()->action( //regresa con el error
                'PostController@index')->with(['message' => 'Se actualizó el registro correctamente', 'alert' => 'warning']);
    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }


    public function news()
    {
        //
        $posts = Post::all();
        return view("news.index", ["posts" => $posts]);
    }

    public function newsRead(Request $request, $id)
    {
        //
        $post = Post::findorFail($id);
        return $post;
        return view("news.index", ["post" => $post]);
    }
}
