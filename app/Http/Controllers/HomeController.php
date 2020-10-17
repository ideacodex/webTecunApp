<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Post;
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

        $records = Post::where('status_id', 3)->get(); //El estado es activo
        return view('home', ['records' => $records]);
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
