@extends('layouts.masterLayoutClient')
@section('content')
    <form action="" method="post">
        <div class="wrapper-product">
            <div class="product-img-detail">
                <img src="{{ $productDetail->image_url }}" height="420" width="327">
            </div>
            <div class="product-info">
                <div class="product-text">
                    <h1>{{ $productDetail->product_name }}</h1>
                    <h2>by studio and friends</h2>
                    <p>{{ $productDetail->description }}<br><span style="font-size: 25px;   color: #ED4D2D;">
                            {{ $productDetail->price }}</span></p>
                </div>
                <div class="product-price-btn d-flex">
                    <button type="submit" name="addcart" style="width: 200px;">add to cart</button>
                    <button type="submit">buy now</button>
                </div>
            </div>
        </div>
    </form>
    @if ($productDetail->category_id == 1)
        <div class="container mt-6" style="margin-top: 5%;">
            <h1>Related face products</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-6">
                @foreach ($productAll as $product)
                    {{-- @if ($product->category_id === 1) --}}
                        <div class="col-md-4">
                            <form action="" method="post">
                                <div class="card">
                                    <a class="text-decoration-none"
                                        href="{{ route('user.product-detail', ['id' => $product->id ,'category_id'=>$product->category_id]) }}">
                                        <img src="{{ $product->image_url }}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->product_name }}</h5>
                                        <p class="card-text text-truncate--2">{{ $product->price }}</p>
                                        <div>
                                            <button type="submit" name="addcart" class="btn btn-success">Add to
                                                cart</button>
                                            <a href=""><button type="submit" class="btn btn-success">Buy
                                                    now</button></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    {{-- @endif --}}
                @endforeach
            </div>
        </div>
    @elseif($productDetail->category_id == 2)
        <div class="container mt-6" style="margin-top: 5%;">
            <h1>Related hair products</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-6">
                @foreach ($productAll as $product)
                    {{-- @if ($product->categories === 'face') --}}
                        <div class="col-md-4">
                            <form action="" method="post">
                                <div class="card">

                                    <a class="text-decoration-none"
                                        href="{{ route('user.product-detail', ['id' => $product->id ,'category_id'=>$product->category_id]) }}">
                                        <img src="{{ $product->image_url }}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->product_name }}</h5>
                                        <p class="card-text text-truncate--2">{{ $product->price }}</p>
                                        <div>
                                            <button type="submit" name="addcart" class="btn btn-success">Add to
                                                cart</button>
                                            <a href=""><button type="submit" class="btn btn-success">Buy
                                                    now</button></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    {{-- @endif --}}
                @endforeach
            </div>
        </div>
    @endif
@endsection
