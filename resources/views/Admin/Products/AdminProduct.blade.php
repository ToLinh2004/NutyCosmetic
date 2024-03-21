@extends('layouts.masterLayoutAdmin')
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">PRODUCTS</h1>
    @endsection

    <div class="buttonAddProduc">
        <button type="submit" class="btn btn-success mx-3">
            Add Product
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <div class="tableProduct mt-5">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col" style="width:15%">Product Name</th>
                    <th  scope="col">Description</th>
                    <th scope="col" style="width:10%">Image</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
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
                            <td><img src="{{ $item->image_url }}" style="width:100px" alt=""></td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="" class="mx-3 btn btn-warning btn-sm">Edit</a>
                                    <a onclick="return confirm('Bạn có muốn xóa không?')" href="#" class="btn btn-danger btn-sm">Delete</a>
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
