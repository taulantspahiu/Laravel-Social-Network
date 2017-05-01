@extends('layouts.master')

@section('title')
    Login
@endsection

@section('content')
<section class="row login">
    <div class="col-xs-offset-3 col-xs-6" style="">
        <h3>Sign In</h3>
        <form action="{{ route('signin') }}" method="post">
            <div class="form-group {{ $errors->has('email') ? 'alert alert-danger' : ''}}">
                <label for="email">Your email</label>
                <input class="form-control" type="text" name="email" id="email" value = "{{ Request::old('email') }}">
            </div>
            <div class="form-group {{ $errors->has('password') ? 'alert alert-danger' : ''}}">
                <label for="password">Your password</label>
                <input class="form-control" type="password" name="password" id="password" value = "{{ Request::old('password') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</section>
@endsection