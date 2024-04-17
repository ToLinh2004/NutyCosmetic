@extends('layouts.master')
@section('title')
Profile
@endsection

@section('content')
<div class="container">
  <h3>Order details</h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Customer name</th>
        <th scope="col">Status</th>
        <th scope="col">Pay</th>
        <th scope="col">Booking date</th>
        <th scope="col">Operation</th>
      </tr>
    </thead>
    <tbody>
      @if($user_orders->isEmpty())
      <p>No orders have been placed yet</p>
      <a href="{{route('user.all-product')}}" class="btn btn-danger w-25">Order</a>
      @else
      @foreach ($user_orders as $item)
          <tr>
              <td>{{ $item->user->user_name }}</td>
              <td>
                  @if($item->order_status_id == 1)
                      <p>Pending</p>
                  @elseif($item->order_status_id == 2)
                      <p>Processing</p>
                  @elseif($item->order_status_id == 3)
                      <p>Completed</p>
                  @elseif($item->order_status_id == 4)
                      <p>Cancelled</p>
                  @endif
              </td>
              <td>{{ $item->payment_method }}</td>
              <td>{{ $item->date }}</td>
              <td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                    Detail
                  </button>
              </td>
          </tr>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Order details</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="m-3">
                              @foreach ($user_orders_items[$item->id] as $order_item)
                                  <p>Product: {{ $order_item->order_user->product_name }}</p>
                                  <p>Quantity: {{ $order_item->quantity }}</p>
                                  <span style="display: inline-block; font-size: 16px;">Giá :</span> 
                                  <p style="display: inline-block; color: red; margin-left: 5px;">{{ number_format($order_item->unit_price, 0, '', '.') }}</p>
                                  <span style="display: inline-block;font-size: 16px;"> vnđ</span>
                                  <hr>
                              @endforeach
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
      @endif
    </tbody>
  </table>
</div>
@endsection



<!-- Button trigger modal -->


