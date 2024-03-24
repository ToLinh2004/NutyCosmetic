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
                    <th scope="col">ID</th>
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
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="statusDropdown"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $item->status }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="statusDropdown">
                                        {{-- @foreach ($orderStatuses as $status)
                                            <a class="dropdown-item"
                                                href="{{ route('admin.update_status', ['order_id' => $item->id, 'status' => $status->id]) }}">{{ $status->status_name }}</a>
                                        @endforeach --}}
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
