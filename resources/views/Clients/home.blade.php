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
    <!-- About Section -->
    <div class="w3-row w3-padding-64" id="about">
        @foreach ($productPopular as $result)
            <div class="w3-col m6 w3-padding-large w3-hide-small">
                <img src="{{ $result->image_url }}" class="w3-round w3-image w3-opacity-min"
                    style="height: 500px; width: 550px;" alt="{{ $result->image_name }}" width="600" height="750">
            </div>

            <div class="w3-col m6 w3-padding-large">
                <h1 class="w3-center" style="color: #ED4D2D;">Service</h1><br>

                <p class="w3-large">The Catering was founded in blabla by Mr. Smith in lorem ipsum dolor sit amet,
                    consectetur adipiscing elit consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute iruredolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.We only use ingredients.</p>
                <p class="w3-large w3-text-grey w3-hide-medium">Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod
                    temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <div> <a href="{{ route('user.product-detail', ['id' => $result->id, 'category_id' => $result->category_id]) }}"
                        class="btn btn-success">View more </a></div>
            </div>
        @break
    @endforeach
</div>

<hr>

<!-- Menu Section -->
<div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col w3-padding-large">
        <h1 class="w3-center" style="color: #ED4D2D;">Popular</h1><br>
    </div>
    @foreach (array_slice($productPopular, 1, 2) as $result)
        <div class="w3-col l6 w3-padding-large">

            <h4>{{ $result->product_name }}</h4>
            <p class="w3-text-grey">{{ $result->description }}</p><br>

            <h4>Honey Almond Granola with your skin</h4>
            <p class="w3-text-grey">Natural cereal of honey so cool</p><br>

            <h4></h4>
            <p class="w3-text-grey">Vanilla flavored batter with malted flour 7.50</p><br>
            <div> <a href="{{ route('user.product-detail', ['id' => $result->id, 'category_id' => $result->category_id]) }}"
                    class="btn btn-success">View more </a></div>

        </div>

        <div class="w3-col l6 w3-padding-large">
            <img src="{{ $result->image_url }}" style="height: 500px; width: 550px;"
                class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
        </div>
    @endforeach
</div>

<hr>
</div>
<div class="w3-row w3-padding-64" id="about">
    @foreach (array_slice($productPopular, 1, 1) as $result)
        <div class="w3-col m6 w3-padding-large w3-hide-small">
            <img src="{{ $result->image_url }}" class="w3-round w3-image w3-opacity-min"
                style="height: 500px; width: 550px;" alt="{{ $result->image_name }}" width="600" height="750">
        </div>
        <div class="w3-col m6 w3-padding-large">
            <h1 class="w3-center" style="color: #ED4D2D;">Golden</h1><br>

            <p class="w3-large">The Catering was founded in blabla by Mr. Smith in lorem ipsum dolor sit amet,
                consectetur adipiscing elit consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute iruredolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.We only use ingredients.</p>
            <p class="w3-large w3-text-grey w3-hide-medium">Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod
                temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <div> <a href="{{ route('user.product-detail', ['id' => $result->id, 'category_id' => $result->category_id]) }}"
                    class="btn btn-success">View more </a></div>
        </div>
    @break
@endforeach
</div>
@endsection
