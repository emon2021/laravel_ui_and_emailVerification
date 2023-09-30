@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 card p-0">
                <div class="card-header">
                    <h4 class="float-start">Edit Class</h4>
                    <a href="{{route('classes.index')}}" class="btn btn-primary float-end">All Class</a>
                </div>
                
                <div class="card-body">
                    <form action="{{route('update.class',$data->id)}}" method="post">
                        @csrf
                        <div class="col-3"></div>
                        <div class="col-6 justify-content-center m-auto">
                            <div class="">
                                <label for="forClassName">Class Name</label>
                                <input type="text" name="class_name" value="{{$data->class_name}}" placeholder="Class Name" class="form-control">
                                
                            </div>
                            <div class="">
                                <input type="submit" name="submit" value="Update" class="btn btn-primary mt-2 px-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection