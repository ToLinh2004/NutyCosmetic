@extends('layouts.masterLayoutAdmin')
@section('titles')
    Product
@endsection
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">
            ADD PRODUCT
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
            <form action="{{ route('admin.storeproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3 mb-3">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control mt-2" id="product_name" name="product_name" required
                        value="{{ old('product_name') }}">
                    @error('product_name')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control mt-2" id="description" name="description" rows="3" >{{ old('description') }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <input type="number" class="form-control mt-2" id="price" name="price"
                        required value="{{ old('price') }}">
                    @error('price')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="image_name">Image Name:</label>
                    <input type="text" class="form-control mt-2" id="image_name" name="image_name"
                        value="{{ old('image_name') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="image">Image URL</label>
                    <input type="file" class="form-control mt-2" id="image" name="image"
                        value="{{ old('image') }}">
                    @error('image')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control mt-2" id="quantity" name="quantity"
                        required value="{{ old('quantity') }}">
                    @error('quantity')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="category">Category</label>
                    <select class="form-select mt-2" name="category" id="category" aria-label="Select a category"
                        required>
                        <option value="" disabled selected>--Choose a category--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mb-3 me-3">Add Product</button>
                    <a href="{{ route('admin.products') }}" class="btn btn-warning mb-3">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
