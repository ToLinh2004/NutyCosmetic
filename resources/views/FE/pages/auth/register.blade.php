@extends('layouts.master')
@section('content')
    <div>
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">The data entered is invalid. Please check again</div>
    @endif
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-8  border border-info rounded p-4 ">
            <form action="{{route('storeUser')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3 class="text-center">Register</h3>
                <div class="form-group mt-3 mb-3">
                    <label for="user_name">User Name:</label>
                    <input type="text" class="form-control mt-2" id="user_name" name="user_name" required
                        value="{{ old('user_name') }}">
                    @error('user_name')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="phone">Phone:</label>
                    <input type="number" class="form-control mt-2" id="phone" name="phone" required
                        value="{{ old('phone') }}">
                    @error('phone')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 mb-3">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control mt-2" id="password" name="password" required>
                    @error('password')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control mt-2" id="email" name="email" required
                        value="{{ old('email') }}">
                    @error('email')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control mt-2" id="image" name="image" required
                        value="{{ old('image') }}">
                    @error('image')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control mt-2" id="address" name="address" required
                        value="{{ old('address') }}">
                    @error('address')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info">Register</button>
                    <div class="d-flex justify-content-center mt-3">
                        <p class="text-center ">Do you have an account yet?</p>
                        <a href="{{ route('login') }}" class="ml-2"><b>Login</b></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection