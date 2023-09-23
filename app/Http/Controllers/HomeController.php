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

    // deposite money page view and verification method
    public function deposite()
    {
        return view('deposite');
    }
    public function verified(){
        return view('auth.verify');
    }

    public function resend(){
        return view();
    }
}
