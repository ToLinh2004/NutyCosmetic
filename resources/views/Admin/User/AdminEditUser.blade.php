@extends('layouts.masterLayoutAdmin')
@section('titles')
    User
@endsection
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">
            EDIT USER
        </h1>
    @endsection
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    @if (session('msgerror'))
    <div class="alert alert-success">{{ session('msgerror') }}</div>
@endif
    @if ($errors->any())
        <div class="alert alert-danger">The data entered is invalid. Please check again</div>
    @endif
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-8  border border-info rounded p-4 ">
            <form action="{{ route('admin.updateuser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3 mb-3">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" name="user_name" placeholder="Ho va ten" value="{{old('user_name') ?? $userDetail -> user_name}}">
                    @error('user_name')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="phone">Phone Number</label>
                    <input type="number" class="form-control" name="phone" placeholder="phone" value="{{old('phone') ?? $userDetail -> phone }}">
                    @error('phone')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="password" value="{{old('password') ?? $userDetail -> password }}">
                    @error('password')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="email" value="{{old('email') ?? $userDetail -> email }}">
                    @error('email')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" name="image" placeholder="image" value="{{old('image') ?? $userDetail -> image }}">
                    @error('image')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" name="address" placeholder="address" value="{{old('address') ?? $userDetail -> address }}">
                    @error('address')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status">
                        <option value="Active" {{ (old('status') ?? $userDetail->status) == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ (old('status') ?? $userDetail->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mb-3 me-3">Edit User</button>
                    <a href="{{ route('admin.user') }}" class="btn btn-warning mb-3">Back</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
