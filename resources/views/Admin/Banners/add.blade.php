@extends('layouts.masterLayoutAdmin')
@section('titles')
    Add Banner
@endsection
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">
            ADD BANNERS
        </h1>
    @endsection

    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">The data entered is invalid. Please check again</div>
    @endif
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-8  border border-info rounded p-4">
            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="banner_name">Banner Name:</label>
                    <input type="text" id="banner_name" name="banner_name" class="form-control mt-2"
                        placeholder="Enter banner name" required>
                    @error('banner_name')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control mt-2" id="image" name="image"
                        value="{{ old('image') }}">
                    @error('image')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-3 me-3">Add Banner</button>
                <a href="{{ route('admin.banners.index') }}" class="btn btn-warning mb-3">Back</a>
            </form>

        </div>
    </div>
</div>
@endsection
