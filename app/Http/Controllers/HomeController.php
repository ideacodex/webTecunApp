<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

    public function team()
    {
        return view('users.home');
    }

    public function specialTeam()
    {
        return view('users.index');
    }

    public function games()
    {
        return view('games.home');
    }

    public function question()
    {
        return view('games.question');
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
