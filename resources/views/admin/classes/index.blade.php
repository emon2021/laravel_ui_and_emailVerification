@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 card p-0">
                <h4 class="card-header">Classes</h4>
                <div class="card-body">
                    <a href="#" class="btn btn-primary float-end">Add New</a>
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
                                        <a href="#" class="btn btn-success ">Edit</a>
                                        <a href="#" class="btn btn-danger ">Delete</a>
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