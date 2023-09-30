@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 card p-0">
                <div class="card-header">
                    <h4 class="float-start">Classes</h4>
                    <a href="{{route('create.class')}}" class="btn btn-primary float-end">Add New</a>
                </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                <div class="card-body">
                   <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Class Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($class as $key=>$data)
                           
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$data->class_name}}</td>
                                    <td>
                                        <a href="{{route('edit.class',$data->id)}}" class="btn btn-success ">Edit</a>
                                        <a href="{{route('delete.class',$data->id)}}" class="btn btn-danger ">Delete</a>
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