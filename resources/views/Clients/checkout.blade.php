@extends('layouts.masterLayoutClient')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <ol class="activity-checkout mb-0 px-4 mt-3">
                        <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-receipt text-white font-size-20"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Payment Information</h5>
                                    <div class="mb-3">
                                        <form id="checkout-form" method="post" action="{{ route('user.checkout-success') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-name">Name</label>
                                                        <input type="text" name="billing-name" class="form-control" id="billing-name" value="{{Session::get('user_name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-email-address">Email</label>
                                                        <input type="email" name="billing-email-address" class="form-control" id="billing-email-address" value="{{ Session::get('email') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-phone">Phone</label>
                                                        <input type="text" class="form-control" name="billing-phone" id="billing-phone" value="{{ Session::get('phone') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="billing-address">Address</label>
                                                <textarea class="form-control" id="billing-address" name="shipping_address" rows="3" placeholder="Enter full address"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-success">
                                                <i class="mdi mdi-cart-outline me-1">Complete</i> 
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>     
            </div>
            <div class="col-6">
                <div class="card checkout-order-summary">
                    <div class="card-body">
                        <div class="p-3 bg-light mb-3">
                            <h5 class="font-size-16 mb-0">Order Information</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 table-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                        <th class="border-top-0" scope="col">Product Description</th>
                                        <th class="border-top-0" scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalAll = 0;
                                        $index = 0;
                                    @endphp
                                    @foreach ($carts as $index => $cartItem)
                                        @php
                                            $total = $cartItem['price'] * $cartItem['quantity'];
                                            $totalAll += $total;
                                        @endphp
                                            <tr>
                                                <th scope="row"><img src="{{ asset($cartItem['image']) }}" alt="product-img" title="product-img" style="width: 200px"></th>
                                                <td>
                                                    <h5 class="font-size-16 text-truncate"><a href="#" class="text-dark">{{ $cartItem['name'] }}</a></h5>
    
                                                    <p class="text-muted mb-0 mt-1">{{ $cartItem['price'] }} VNĐ x {{ $cartItem['quantity'] }}</p>
                                                </td>
                                                <td> {{ $total }} VNĐ </td>
                                            </tr>
                                     @endforeach
    
                                    <tr>
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Subtotal :</h5>
                                        </td>
                                        <td>
                                            {{ $totalAll }} VNĐ
                                        </td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Total Payment:</h5>
                                        </td>
                                        <td>
                                            {{ $totalAll }} VNĐ
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </form> 
    </div>
</div>
    <script src="{{asset('js/product.js')}}"></script>
@endsection
