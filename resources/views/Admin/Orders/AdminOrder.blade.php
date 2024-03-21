@extends('layouts.masterLayoutAdmin')
@section('card')
    <div>
        @section('title')
        <h1 class="text-center title">ORDERS</h1> 
        @endsection
        <div class="buttonAddOrder">
            <button type="submit" class="btn btn-success mx-3">
                Add Orders
                <i class="fa fa-plus"></i>
            </button>
        </div>
        <div class="tableOrder mt-5">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($orders))
                    @foreach ($orders as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->user_name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->status_name }}</td>
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
