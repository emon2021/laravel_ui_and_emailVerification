@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 card p-0">
                <div class="card-header">
                    <h4 class="float-start">Add Class</h4>
                    <a href="{{route('classes.index')}}" class="btn btn-primary float-end">All Class</a>
                </div>
                
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
             
                <div class="card-body">
                    <form action="{{route('store.class')}}" method="post">
                        @csrf
                        <div class="col-3"></div>
                        <div class="col-6 justify-content-center m-auto">
                            <div class="">
                                <label for="forClassName">Class Name</label>
                                <input type="text" name="class_name" @error('class_name') is-invalid @enderror placeholder="Class Name" class="form-control">
                                @error('class_name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="">
                                <input type="submit" name="submit" value="Add" class="btn btn-primary mt-2 px-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection