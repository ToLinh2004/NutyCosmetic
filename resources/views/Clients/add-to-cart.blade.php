@extends('layouts.masterLayoutClient')
@section('content')
    <section class="shoppingcart-page">
        <form action="" method=" ">
            <div class="container">
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr >
                            <th>STT</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                            <th><button type="button" class="btn btn-light btn-light-action" >Action</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                         $total = 0;
                         $stt = 0;
                            $totalAll = 0;
                        @endphp
                        @foreach ($carts as $cartItem)
                        @php
                         $total = $cartItem['price'] * $cartItem['quantity'];
                            $totalAll += $total;
                        @endphp
                            <tr>
                                <td>{{$stt +1}}</td>
                                <td>{{ $cartItem['name'] }}</td>
                                <td><img src="{{ $cartItem['image'] }}" alt="" style="width:150px;height:140px;"></td>
                                <td><input type="number" value= '{{ $cartItem['quantity'] }}' min='1'></td>
                                <td>{{ $cartItem['price'] }}</td>
                                <td>{{$total}}</td>
                                <td colspan='2' style="padding-top: 60px">
                                    <a href="" ><i class='fa-solid fa-trash' style="padding-right:40px;padding-left:15px"></i></a>
                                    <a href=""><i class="fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                            @php
                            $stt++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="400" height="13" viewBox="0 0 475 13" fill="none">
                        <path d="M0.666679 7.01152C0.673041 9.95703 3.06601 12.3397 6.01152 12.3333C8.95703 12.327 11.3397 9.93399 11.3333 6.98848C11.327 4.04297 8.93399 1.66032 5.98848 1.66668C3.04297 1.67304 0.660317 4.06601 0.666679 7.01152ZM463.667 6.01148C463.673 8.95699 466.066 11.3396 469.012 11.3333C471.957 11.3269 474.34 8.93395 474.333 5.98844C474.327 3.04293 471.934 0.660278 468.988 0.66664C466.043 0.673002 463.66 3.06597 463.667 6.01148ZM6.00216 8L469.002 6.99996L468.998 4.99996L5.99784 6L6.00216 8Z" fill="#505050" />
                    </svg>
                </div>
                <div>
                    <div class="d-flex justify-content-end">
                        <pre>Total:                             </pre>
                        <p>{{$totalAll}}</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="" style="width: 100px;">Checkout</a>
                </div>
            </div>
        </form>
    </section>
@endsection;