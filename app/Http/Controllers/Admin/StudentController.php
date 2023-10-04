<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $info = DB::table('classes')->get();
       // $row = DB::table('students')->orderBy('roll','ASC')->get();
       $row = DB::table('students')->join('classes','students.class_id','classes.id')->orderBy('roll','ASC')->get();
       
        return view('admin.students.index',compact('row'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class_id = DB::table('classes')->get();
        return view('admin.students.create',compact('class_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'roll' => 'required|integer|min:1',
            'class_id' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'required|email',
        ]);
        try{
            $data = array(
                'name' => $request->name,
                'roll' => $request->roll,
                'class_id' => $request->class_id,
                'phone' => $request->phone, 
                'email' => $request->email,
            );
            DB::table('students')->insert($data);
            return redirect()->back()->with('success','Student Added Successfully!');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error',' Something Went Wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = DB::table('students')->where('id',$id)->first();
        $class_id = DB::table('classes')->get();
        return view('admin.students.edit',compact('student','class_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'roll' => 'required|integer|min:1',
            'class_id' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'required|email',
        ]);
        try{
            $data = array(
                'name' => $request->name,
                'roll' => $request->roll,
                'class_id' => $request->class_id,
                'phone' => $request->phone, 
                'email' => $request->email,
            );
            DB::table('students')->where('id',$id)->update($data);
            return redirect()->route('students.index')->with('success','Student Updated Successfully!');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error',' Something Went Wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('students')->where('id',$id)->delete();
        return redirect()->back()->with('successMsg','Student Deleted Successfully!');
    }
}
