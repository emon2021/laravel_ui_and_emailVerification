<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
    //password change view file
    public function passChange()
    {
        return view('passwordChange');
    }
    //update password
    public function updatePass(Request $request)
    {
       $request->validate([
            'current_password'=>'required',
            'new_password'=>'required|min:8|string|confirmed',
       ]);
       $user = Auth::user();
       if(Hash::check($request->current_password,$user->password))
       {
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
       }
       else
       {
            return redirect()->back()->with('failed','Current password is incorrect!');
       }
    }
}
