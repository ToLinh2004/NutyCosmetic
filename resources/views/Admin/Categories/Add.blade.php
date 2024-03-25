@extends('layouts.masterLayoutAdmin')
@section('titles')
    Add Categories 
@endsection
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">
            ADD CATEGORIES 
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
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <label for="category_name">Category Name:</label> <br><br>
                    <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Enter category name" required>
                    @error('category_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div><br><br>
                <button type="submit" class="btn btn-primary mb-3 me-3">Add Category</button>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-warning mb-3">Back</a>
            </form>
            
        </div>
    </div>
</div>
@endsection
