@extends('layouts.masterLayoutAdmin')
@section('titles')
    Order
@endsection
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">ORDERS</h1>
    @endsection
    <div class="tableOrder mt-5">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Order Status</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($ordersList))
                    @foreach ($ordersList as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->totalprice }}</td>
                            <td>{{ $item->productname }}</td>
                            <td>
                                <div class="mb-3 row">
                                    <div class=" col-sm-6">
                                        <form action="{{route('admin.order.update', ['id' => $item->id])}}" method="post">
                                            @csrf 
                                            <select class="form-select" name="order_status" aria-label="Default select example" id="status">
                                                <option>Choose the status of order</option>
                                                @foreach ($orderStatus as $status)
                                                    <option value="{{ $status->id }}" {{ $item->status_id == $status->id ? 'selected' : '' }}>{{ $status->status_name }}</option>
                                                @endforeach  
                                            </select>
                                            <button type="submit" class="btn btn-primary mt-3">Update Status</button>
                                        </form>
                                    </div>
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
