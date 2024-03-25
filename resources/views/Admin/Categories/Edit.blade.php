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
       
        <form action="{{ route('admin.category.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="form-group">
                <label for="category_name">Category Name:</label><br><br>
                <input type="text" class="form-control" name="category_name" placeholder="category_name" value="{{old('category_name') ?? $categoryDetail -> category_name}}">
                    @error('category_name')
                        <span style="color:red">{{$message}}</span>
                    @enderror
            </div><br><br>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
</div>
@endsection
































































