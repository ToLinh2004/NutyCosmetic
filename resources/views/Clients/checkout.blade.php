@extends('layouts.masterLayoutClient')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-8">
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
                                        <form method="post" action="?controller=checkout&action=processCheckout&page=customer">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-name">Tên</label>
                                                        <input type="text" name="billing-name" class="form-control" id="billing-name" placeholder="Nhập tên">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-email-address">Email</label>
                                                        <input type="email" name="billing-email-address" class="form-control" id="billing-email-address" placeholder="Nhập Email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-phone">Số điện thoại</label>
                                                        <input type="text" class="form-control" name="billing-phone" id="billing-phone" placeholder="Nhập SĐT">
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
        <div class="col-xl-4">
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
                                <?php
                                $cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
                                $subtotal = 0;
                                ?>
                                <?php
                                foreach ($cartItems as $product_id => $item) :

                                    $subtotal += $item['price'] * ($item['quantity']+1);
                                ?>
                                    <tr>
                                        <th scope="row"><img src="<?php echo $item['image'] ?>" alt="product-img" title="product-img" class="avatar-lg rounded"></th>
                                        <td>
                                            <h5 class="font-size-16 text-truncate"><a href="#" class="text-dark"><?php echo $item['name'] ?></a></h5>

                                            <p class="text-muted mb-0 mt-1"><?php echo $item['price'] ?> VNĐ x <?php echo $item['quantity']+1 ?></p>
                                        </td>
                                        <td> <?php echo ($item['price'] * $item['quantity']) ?> VNĐ </td>
                                    </tr>
                                <?php endforeach ?>

                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Tổng thu :</h5>
                                    </td>
                                    <td>
                                        <?= $subtotal; ?> VNĐ
                                    </td>
                                </tr>
                                <tr class="bg-light">
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Tổng thanh toán:</h5>
                                    </td>
                                    <td>
                                    <?= $subtotal; ?> VNĐ
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{asset('js/product.js')}}"></script>

@endsection
