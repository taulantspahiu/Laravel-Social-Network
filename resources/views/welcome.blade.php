@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group {{ $errors->has('email-signup') ? 'alert alert-danger' : ''}}">
                    <label for="email">Your email</label>
                    <input class="form-control" type="text" name="email" id="email" value = "{{ Request::old('email-signup') }}">
                </div>
                <div class="form-group {{ $errors->has('name') ? 'alert alert-danger' : ''}}">
                    <label for="name-signup">Your First Name</label>
                    <input class="form-control" type="text" name="name-signup" id="name-signup" value = "{{ Request::old('name-signup') }}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'alert alert-danger' : ''}}">
                    <label for="password-signup">Your password</label>
                    <input class="form-control" type="password" name="password-signup" id="password-signup" value = "{{ Request::old('password-signup') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}"> <!--security for cross site attacks-->
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group {{ $errors->has('email-login') ? 'alert alert-danger' : ''}}">
                    <label for="email">Your email</label>
                    <input class="form-control" type="text" name="email-login" id="email" value = "{{ Request::old('email-login') }}">
                </div>
                <div class="form-group {{ $errors->has('password-login') ? 'alert alert-danger' : ''}}">
                    <label for="password">Your password</label>
                    <input class="form-control" type="password" name="password-login" id="password" value = "{{ Request::old('password-login') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection