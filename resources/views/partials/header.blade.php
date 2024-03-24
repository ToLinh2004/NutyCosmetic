<div class="logo-container">
    <img src="{{asset('images/logo.png')}}" style="width: 80px; height: 80px;">
</div>
<nav class="main-menu" id="myTopnav">
    <a href="{{route('home')}}">Home</a>
    <div>
        <div class="dropdown">
            <div data-bs-toggle="dropdown" aria-expanded="false" style="margin-right:10px;">
                <p style="margin-top: 15px;margin-right:10px" class="underline-on-hover">Product</p>
            </div>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('product-face')}}">Face</a></li>
                <li><a class="dropdown-item" href="{{route('product-hair')}}">Hair</a></li>
                <li><a class="dropdown-item" href="{{route('all-product')}}">All Product</a></li>
            </ul>
            </ul>
        </div>
    </div>
    <a href="">About Us</a>
    <a href="">Contact Us</a>
</nav>
<div class="search-container">
    <form action="" method="post">
        <input type="text" placeholder="Search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <button class="burger-menu" type="button" onclick="toggleMenu()">&#9776;</button>
    </form>
</div>
<div class="icon-nav">
    <div class="item1">
        <a href=""><i class="fa-solid fa-cart-shopping" style="font: size 40px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i></a>
    </div>

    <a class="dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        
        <a class="dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src='{{asset('images/user.png')}}' alt="" id="output" class="rounded-circle" style="width:28px;height:28px;margin-right: 50px;margin-top:0px">
        </a>
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="">Register</a></li>
        <li><a class="dropdown-item" href="">Login</a></li>
        <li><a class="dropdown-item" href="">Logout</a></li>
        <li><a class="dropdown-item" href="">Profile</a></li>
    </ul>
</div>