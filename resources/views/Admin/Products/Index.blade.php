@extends('layouts.masterLayoutAdmin')
@section('titles')
    Product
@endsection
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">PRODUCTS</h1>
    @endsection
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <a href="{{ route('admin.product.add') }}">
        <div class="buttonAddProduct">
            <button type="submit" class="btn btn-success mx-3">
                Add Product
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </a>
    <div class="tableProduct mt-5">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col" style="width:15%">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col" style="width:10%">Image</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($productList))
                    @foreach ($productList as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->product_name }}</td>
                            <td class="ellipsis" onclick="showFullText(this)">{{ $item->description }}</td>
                            <td><img src="{{ asset($item->image_url) }}" style="width:100px" alt="avatar"></td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.product.edit', ['id' => $item->id]) }}"
                                        class="mx-3 btn btn-warning btn-sm">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete?')" href="{{route('admin.product.delete',['id' => $item->id])}}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
