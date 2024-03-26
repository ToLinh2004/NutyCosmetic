@extends('layouts.master')
@if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
    @endif
@section('content')
    <div class="container">
        <div class="wrapper d-flex align-items-center justify-content-center h-100">
            <div class="card login-form">
                <div class="card-body">
                    <h5 class="card-title text-center">Login Form</h5>
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        @if ($errors->has('email'))
                        <code class="error-message">{{ $errors->first('email') }}</code>
                    @endif
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        @if ($errors->has('password'))
                        <code class="error-message">{{ $errors->first('password') }}</code>
                    @endif
                        <button type="submit" class="btn btn-primary w-100">login</button>
                        <div class="sign-up mt-4">
                            Don't have an account? <a href="{{route('registerUser')}}">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @endsection
