@extends('layouts.masterLayoutClient')
@section('baner')
    <div id="banner">
        <div class="left-section">
            <div>
                <h1>Pretty Girls</h1>
                <h2 class="fw-bold">
                    <span>In the past, beauty was given by God</span>
                    <br>
                    <span>Nowadays beauty is made by people</span>
                </h2>
                <br>
                <h5 class="fw-bold">Beauty is a gift from heaven. But how long it lasts is up to you to take care of</h5>
            </div>
        </div>
        <div class="right-section">
            <img src="https://res.cloudinary.com/di9iwkkrc/image/upload/v1701007081/Prety_Girls/ybbf7561bxtuutopksth.jpg"
                alt="Background Image">
        </div>
    </div>
@endsection

@section('content')
    <div class="container mt-6" style="margin-top: 5%;">
        @if(isset($typeCategory))
        <h1>{{$typeCategory->category_name}}</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-6">
            @foreach ($products as $product)
                    <div class="col-md-4">
                        <form action="" method="post">
                            <div class="card">
                                <a class="text-decoration-none" href="{{ route('user.product-detail', ['id' => $product->id ,'category_id'=>$product->category_id]) }}">
                                    <img src="{{ $product->image_url }}" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->product_name }}</h5>
                                    <p class="card-text text-truncate--2">{{ $product->price }}</p>
                                    <div>
                                        <a href="{{ route('user.add-to-cart', ['id' => $product->id]) }}" class="btn btn-success add-to-cart" data-url="{{ route('user.add-to-cart', ['id' => $product->id]) }}">Add to cart</a>
                                        <a href=""><button type="submit" class="btn btn-success">Buy now</button></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            @endforeach
        </div>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{asset('js/product.js')}}"></script>
@endsection
