<div class="logo-container">
    <img src="{{ asset('images/logo.png') }}" style="width: 80px; height: 80px;">
</div>
<nav class="main-menu" id="myTopnav">
    <a href="{{ route('user.home') }}">Home</a>
    <a href="{{ route('user.all-product') }}">Product</a>
    <div>
        <div class="dropdown">
            <div data-bs-toggle="dropdown" aria-expanded="false" style="margin-right:10px;">
                <p style="margin-top: 15px;margin-right:10px" class="underline-on-hover">Category</p>
            </div>
            <ul class="dropdown-menu">
                @foreach ($category as $item)
                    <li><a class="dropdown-item"
                            href="{{ route('user.category-detail', ['id' => $item->id]) }}">{{ $item->category_name }}</a>
                    </li>
                @endforeach
            </ul>
            </ul>
        </div>
    </div>
    <a href="">About Us</a>
    <a href="{{route('user.contact-us')}}">Contact Us</a>
</nav>
<div id="timkiem" class="col-3 p-2">
    <form  action="" method="get">
    <input class="border border-black p-2 col-6" placeholder= "Keyword">
    <button type="submit" class="btn btn-dark p-2 col-2"><i class="fa-solid fa-magnifying-glass" style="padding-left: 10px"></i> </button>
    </form>
    <div id="ketquatim">
       <!-- kết quả tìm kiếm -->
    </div>
  </div>
<div class="icon-nav">
    <div class="item1">
        <a href="{{route('user.show-cart')}}"><i class="fa-solid fa-cart-shopping"
                style="font: size 40px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i></a>
    </div>

    <a class="dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <a class="dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            @if (session()->has('user_id') && session()->has('image'))
                @php
                    $image = session('image');
                @endphp
                <img src='{{ $image }}' alt="" id="output" class="rounded-circle"
                    style="width:28px;height:28px;margin-right: 50px;margin-top:0px">
            @else
                <img src='{{ asset('images/user.png') }}' alt="" id="output" class="rounded-circle"
                    style="width:28px;height:28px;margin-right: 50px;margin-top:0px">
            @endif
        </a>
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        @if (session()->has('user_id'))
            <li><a class="dropdown-item" href="{{ route('dashboard.user') }}">Profile</a></li>
            <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
            <li><a class="dropdown-item" href="{{route('user.wishlist.index')}}">Wishlist</a></li>
        @else
            <li><a class="dropdown-item" href="{{ route('registerUser') }}">Register</a></li>
            <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
        @endif
    </ul>
</div>
