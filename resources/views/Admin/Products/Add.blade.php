@extends('layouts.masterLayoutAdmin')
@section('titles')
    Add product
@endsection
@section('card')                                                                                                                                            
    <div>
    @section('title')
        <h1 class="text-center title">
            ADD PRODUCT 
        </h1>
    @endsection
    
    <div class="buttonAddUser">
        
    </div>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-8  border border-info rounded p-4">
            <form id="addProductForm">
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="productName" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="imageUrl" class="form-label">Image URL</label>
                    <input type="file" class="form-control" id="imageUrl" name="imageUrl">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="0" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="Category 1">Category 1</option>
                        <option value="Category 2">Category 2</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
