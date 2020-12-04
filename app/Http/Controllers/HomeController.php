<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

use DB;

use App\Post;
use App\Reaction;
use App\Question;
use App\Category;
use App\Award;
use App\User;
use App\Score;

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

        $records = Post::with('likes')->get();//El estado es activo

        $categories = Category::all();
            
        return view('home', [
            'posts' => $records,
            'categories' => $categories
        ]);
    }

    public function news()
    {
        return view('news.index');
    }

    public function team()
    {
        $awards = Award::with('user')->where('active',1)->get();
        return view('users.team', ["awards" => $awards]);
    }

    public function specialTeam()
    {
        return view('users.specialteam');
    }

    public function games()
    {

        $score = Score::with('user')->orderBy('points', 'DESC')->limit(5)->get();

        $i = array(1, 2, 3, 4, 5);

        return view('games.home', [
            'score' => $score,
        ]);
    }

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
}
