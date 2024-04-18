@extends('layouts.masterLayoutClient')
@section('content')
@php
$user_id = Session::get('user_id')   
@endphp
<div class="container">
    <div class="row">
        <form action="{{ route('user.checkoutSuccess') }}" method="post">
            @csrf
            <div class="col-12">
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
                                        <h5 class="font-size-16 mb-1">Thông tin thanh toán</h5>
                                        <div class="mb-3">
                                            <form method="post" action="#">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-name">Tên</label>
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
                                                            <label class="form-label" for="billing-phone">Số điện thoại</label>
                                                            <input type="text" class="form-control" name="billing-phone" id="billing-phone" value="{{ Session::get('phone') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="billing-address">Địa chỉ</label>
                                                    <textarea class="form-control" id="billing-address" name="shipping_address" rows="3" placeholder="Nhập địa chỉ đầy đủ"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="mdi mdi-cart-outline me-1"></i> Hoàn tất
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col">
                        <a href="?controller=product&action=index&page=customer" class="btn btn-link text-muted">
                            <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card checkout-order-summary">
                    <div class="card-body">
                        <div class="p-3 bg-light mb-3">
                            <h5 class="font-size-16 mb-0">Thông tin đơn hàng</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 table-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0" style="width: 110px;" scope="col">Sản phẩm</th>
                                        <th class="border-top-0" scope="col">Mô tả sản phẩm</th>
                                        <th class="border-top-0" scope="col">Giá</th>
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
                                            <h5 class="font-size-14 m-0">Tổng thu :</h5>
                                        </td>
                                        <td>
                                            {{ $totalAll }} VNĐ
                                        </td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Tổng thanh toán:</h5>
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
