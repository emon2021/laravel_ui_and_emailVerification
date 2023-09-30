@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 card p-0">
                <div class="card-header">
                    <h4 class="float-start">Add Student</h4>
                    <a href="{{route('students.index')}}" class="btn btn-primary float-end">All Student</a>
                </div>
                
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">{{session()->get('error')}}</div>
                    @endif
             
                <div class="card-body">
                    <form action="{{route('students.store')}}" method="post">
                        @csrf
                        <div class="col-3"></div>
                        <div class="col-6 justify-content-center m-auto">
                            <div class="">
                                <label for="forClassName">Student Name</label>
                                <input type="text" value="{{old('name')}}" name="name" @error('name') is-invalid @enderror placeholder="Student Name" class="form-control">
                                @error('name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="">
                                <label for="forRoll">Roll</label>
                                <input type="number" value="{{old('roll')}}" name="roll" @error('roll') is-invalid @enderror placeholder="Roll" class="form-control">
                                @error('roll')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="">
                                <label for="">Select Class</label>
                               <select class="form-control" name="class_id" onclick="clickHide()">
                                    <option class="selected" Selected >Select Class</option>
                                    @foreach($class_id as $data)
                                    <option value="{{$data->id}}">{{$data->class_name}}</option>
                                    @endforeach
                               </select>
                            </div>
                            <div class="">
                                <label for="forPhone">Phone Number</label>
                                <input type="number" value="{{old('phone')}}" name="phone" @error('phone') is-invalid @enderror placeholder="Phone Number" class="form-control">
                                @error('phone')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="">
                                <label for="forEmail">Email</label>
                                <input type="email" value="{{old('email')}}" name="email" @error('email') is-invalid @enderror placeholder="Email" class="form-control">
                                @error('email')
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