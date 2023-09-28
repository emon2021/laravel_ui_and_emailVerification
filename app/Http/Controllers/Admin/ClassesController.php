<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    // this is for authenticate users
    public function __construct()
    {
        $this->middleware('auth');
    }

    //__class index method for crud__//
    public function index()
    {
        $class = DB::table('classes')->get();
        return view('admin.classes.index',compact('class'));
    }



}
