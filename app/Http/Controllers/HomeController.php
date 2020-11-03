<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

use DB;

use App\Post;
use App\Reaction;
use App\Question;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if (!$user->hasAnyRole(Role::all())) {
            auth()->user()->syncRoles('User');
        }

        $records = Post::all();//El estado es activo

        $reaction = Reaction::all();

        $reactionActive = $reaction[0]->active;

        //Obtener el ID de la reaccion por medio de la tabla pivote
        $reactionID = DB::table('post_reaction')->where('reaction_id', $reaction[0]->id)->get();

        //Obtener el objecto de la reaccion dependiendo del ID obtenido por el pivote
        $likes = DB::table('reactions')->where('active', 1)->get();

        //sizeof de reacciones
        $sizeofReaction = sizeof($likes);
            
        return view('home', [
            'posts' => $records,
            'reaction' => $reaction,
            'reactionActive' => $reactionActive,
            'sizeofReaction' => $sizeofReaction
        ]);
    }

    public function news()
    {
        return view('news.index');
    }

    public function team()
    {
        return view('users.team');
    }

    public function specialTeam()
    {
        return view('users.specialteam');
    }

    public function games()
    {
        return view('games.home');
    }

    /*public function question()
    {
        $question = Question::all();
        return view('games.question', ['question' => $question]);
    }*/

    public function podcast()
    {
        return view('podcasts.home');
    }

    public function stores()
    {
        return view('stores.home');
    }

    public function jobs()
    {
        return view('jobs.home');
    }

    public function denounce()
    {
        return view('denounce.index');
    }
}
