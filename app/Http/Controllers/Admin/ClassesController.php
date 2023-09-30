<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class ClassesController extends Controller
{
    // this is for authenticate users
    public function __construct()
    {
        $this->middleware('auth');
    }

    //__class index method showing all classes__//
    public function index()
    {
        $class = DB::table('classes')->get();
        return view('admin.classes.index',compact('class'));
    }
    //__viewing class create page__//
    public function create()
    {
        return view('admin.classes.create');
    }
    //__store class__//
    public function store(Request $request)
    {
        $request->validate([
            'class_name'=>'required|unique:classes',
        ]);
        $data = array(
            'class_name'=>$request->class_name,
        );
        DB::table('classes')->insert($data);
        return redirect()->back()->with('success','New Class Added Successfully!');
    }

    //__delete method for class__//
    public function delete($id)
    {
        DB::table('classes')->where('id',$id)->delete();
        return redirect()->back()->with('deleteSuccess','Class Deleted Successfully!');
    }


    //__edit page view method
    public function edit($id)
    {
        $data = DB::table('classes')->where('id',$id)->first();
        return view('admin.classes.edit',compact('data'));
    }

    
    //__update data for classes
    public function update(Request $request,$id)
    {
        $request->validate([
            'class_name'=>'required',
        ]);
        $data = array(
            'class_name'=>$request->class_name,
        );
        DB::table('classes')->where('id',$id)->update($data);
        return redirect()->route('classes.index')->with('success','Class updated successfully!');
    }


}
