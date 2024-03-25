@extends('layouts.masterLayoutAdmin')
@section('titles')
    Edit Category
@endsection
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">EDIT CATEGORY</h1>
    @endsection
    
    <div class="tableCategory mt-5">
       
        <form action="{{ route('admin.updatecategories') }}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="form-group">
                <label for="category_name">Category Name:</label><br><br>
                <input type="text" class="form-control" name="category_name" placeholder="category_name" value="{{old('category_name') ?? $categoryDetail -> category_name}}">
                    @error('category_name')
                        <span style="color:red">{{$message}}</span>
                    @enderror
            </div><br><br>
            <button type="submit" class="btn btn-primary mb-3 me-3">Update Category</button>
            <a href="{{ route('admin.categories') }}" class="btn btn-warning mb-3">Back</a>
        </form>
    </div>
</div>
@endsection
































































