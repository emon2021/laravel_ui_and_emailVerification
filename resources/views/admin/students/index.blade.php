@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 card p-0">
                <div class="card-header">
                    <h4 class="float-start">All Student</h4>
                    <a href="{{route('students.create')}}" class="btn btn-primary float-end">Add New</a>
                </div>
                    @if(session()->has('successMsg'))
                        <div class="alert alert-success">{{session()->get('successMsg')}}</div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                <div class="card-body">
                   <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Student Name</th>
                                <th>Roll</th>
                                <th>Class Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($row as $key=>$data)
                           
                                <tr>
                                    <td>{{ ++$key}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->roll}}</td>
                                    <td>{{$data->class_name}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->email}}</td>
                                    
                                    <td>
                                        <a href="{{route('students.edit',$data->id)}}" class="btn btn-success ">Edit</a>
                                        <form style="display: inline" action="{{route('students.destroy',$data->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                 
                            @endforeach
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
@endsection