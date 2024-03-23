@extends('layouts.masterLayoutAdmin')
@section('titles')
    User
@endsection
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">
            ADD USER
        </h1>
    @endsection
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">The data entered is invalid. Please check again</div>
    @endif
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-8  border border-info rounded p-4 ">
            <form action="{{ route('admin.storeuser') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                <div>
                    <button type="submit" class="btn btn-primary mb-3 me-3">Add User</button>
                    <a href="{{ route('admin.user') }}" class="btn btn-warning mb-3">Back</a>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
