@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="wrapper d-flex align-items-center justify-content-center h-100">
            <div class="card login-form">
                <div class="card-body">
                    <h5 class="card-title text-center">Login Form</h5>
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">User Name</label>
                            <input type="text" name="user_name" class="form-control" id="exampleInputName"
                                aria-describedby="emailHelp">
                        </div>
                        @if ($errors->has('user_name'))
                        <code class="error-message">{{ $errors->first('user_name') }}</code>
                    @endif
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail"
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

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
                    </div>
                    @if ($errors->has('password_confirmation'))
                    <code class="error-message">{{ $errors->first('password_confirmation') }}</code>
                @endif
                        <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
                        <div class="sign-up mt-4">
                            Don't have an account? <a href="{{route('login.index')}}">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @endsection
