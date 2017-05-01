@extends('layouts.master')

@section('title')
    Signup
@endsection

@section('content')
<section class="row signup">
    <div class="col-xs-offset-3 col-xs-6" style="">
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
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</section>
@endsection