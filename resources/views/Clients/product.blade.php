@extends('layouts.masterLayoutClient')
@section('baner')
<div id="demo" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($banners as $index => $banner)
            <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></button>
        @endforeach
    </div>


    <div class="carousel-inner ">
        @if (!empty($banners))
            @foreach ($banners as $banner)
                <div class="carousel-item active">
                    <img src="{{ asset($banner->image) }}" class="d-block mx-auto img-fluid"
                        style="width:1200px;height: 600px;
                    object-fit: cover;" alt="banner">
                </div>
            @endforeach
        @endif
    </div>

    <button class="carousel-control-prev" style="color: black" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" style="color: black" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
@endsection

@section('content')
    <div class="container mt-6" style="margin-top: 5%;">
        <h1>All Product</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-6">
            @foreach ($productAll as $product)

                <div class="col-md-4 wishlist_aa">

                    <form action="" method="post">
                        <div class="card">
                            @if($product->status_discount === 'discount')
                                <span style="color: red">Sale off 30%</span>
                             @endif
                            <a class="text-decoration-none"
                                href="{{ route('user.product-detail', ['id' => $product->id, 'category_id' => $product->category_id]) }}">
                                <img src="{{ $product->image_url }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
                                <p class="card-text text-truncate--2">{{ $product->price }}</p>
                                <div>
                                    <a href="{{ route('user.add-to-cart', ['id' => $product->id]) }}" class="btn btn-success add-to-cart" data-url="{{ route('user.add-to-cart', ['id' => $product->id]) }}">Add to cart</a>
                                    <a href="#">
                                        <button type="submit" class="btn btn-success">Buy now</button>
                                    </a>

                                    <input type="hidden" name="PId" value="{{ $product->id }}">
                                    <input type="hidden" name="PName" value="{{ $product->product_name }}">
                                    <input type="hidden" name="Image" value="{{ $product->image_url }}">
                                    <input type="hidden" name="PPrice" value="{{ $product->price }}">
                                    <input type="hidden" name="addcart" value="order">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="wishlist_ab">
                        <form action="{{route('user.wishlist.add')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <button style="submit"><i class="fa-regular fa-heart"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{asset('js/product.js')}}"></script>
@endsection
