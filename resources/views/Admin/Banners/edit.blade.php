@extends('layouts.masterLayoutAdmin')
@section('titles')
    Banner
@endsection
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">
            EDIT BANNER
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
            <form action="{{route('admin.banners.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3 mb-3">
                    <label for="banner_name">Banner Name</label>
                    <input type="text" class="form-control mt-2" id="banner_name" name="banner_name" required
                        value="{{ old('name') ?? $bannerDetail->name }}">
                    @error('banner_name')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control mt-2" id="image" name="image"
                        value="">
                    @error('image')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status">
                        <option value="Active"
                            {{ (old('status') ?? $bannerDetail->status) == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive"
                            {{ (old('status') ?? $bannerDetail->status) == 'Inactive' ? 'selected' : '' }}>Inactive
                        </option>
                    </select>
                    @error('status')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mb-3 me-3">Edit banner</button>
                    <a href="{{ route('admin.banners.index') }}" class="btn btn-warning mb-3">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
