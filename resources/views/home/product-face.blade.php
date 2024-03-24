@extends('layouts.master')
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
        <h1>Face</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-6">
            @foreach ($productAll as $product)
                @if ($product->categories === 'face')
                    <div class="col-md-4">
                        <form action="" method="post">
                            <div class="card">
                                <a class="text-decoration-none" href="{{ route('product-detail', ['id' => $product->id]) }}">
                                    <img src="{{ $product->image_url }}" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->product_name }}</h5>
                                    <p class="card-text text-truncate--2">{{ $product->price }}</p>
                                    <div>
                                        <button type="submit" name="addcart" class="btn btn-success">Add to cart</button>
                                        <a href=""><button type="submit" class="btn btn-success">Buy now</button></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
