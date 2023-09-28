@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="card col-6 p-0">
            <h4 class="card-header">Change Password</h4>
            <div class="card-body ">

                @if(session()->has('success'))
                    <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif

                <form action="{{route('update.password') }}" class="" method="post">
                    @csrf
                    <div class="form-input">
                        <label for="forCurrentPassword">Current Password</label>
                        <input type="password" name="current_password" value="{{old('current_password')}}" @error('current_password') is-invallid @enderror
                            placeholder="Current Password" class="form-control">
                        @error('current_password')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        @if(session()->has('failed'))
                            <strong class="text-danger">{{ session()->get('failed') }}</strong>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="forNewPassword">New Password</label>
                        <input type="password" @error('new_password') is-invalid @enderror name="new_password"
                            placeholder="New Password" class="form-control">
                        @error('new_password')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-input">
                        <label for="forConfirmPassword">Confirm Password</label>
                        <input type="password" @error('new_password_confirmation') is-invalid @enderror name="new_password_confirmation"
                            placeholder="Confirm Password" class="form-control">
                        @error('new_password_confirmation')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-input">
                        <label for="forSubmitButton"></label>
                        <input type="submit" value="Change Password"name="submit" class="btn btn-primary mt-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
