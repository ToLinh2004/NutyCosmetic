<div class="navbar d-flex justify-content-between align-items-center">
    <div class="search mx-5">
        <form class="d-inline-flex position-relative" role="search">
            <button type="submit" class="btn position-absolute start-0 top-0 bottom-0" id="search-addon"><i
                    class="fa fa-search" aria-hidden="true"></i></button>
            <input type="search" class="form-control rounded-pill" placeholder="Search here..." aria-label="Search"
                aria-describedby="search-addon">
        </form>
    </div>
    <div class="dropdown">
        <a class="dropdown-toggle me-3" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src='{{ asset('images/user.png') }}' alt="" id="output" class="rounded-circle"
                style="width:28px;height:28px;margin-right: 30px;margin-top:0px">
        </a>
        <ul class="dropdown-menu me-3" aria-labelledby="dropdownMenuButton1">
            @if (session()->has('user_id'))
                <li><a class="dropdown-item me-3" href="">Profile</a></li>
                <li><a class="dropdown-item me-3" href="{{ route('logout') }}">Logout</a></li>
            @else
                <li><a class="dropdown-item me-3" href="{{ route('registerUser') }}">Register</a></li>
                <li><a class="dropdown-item me-3" href="{{ route('login') }}">Login</a></li>
            @endif
        </ul>
    </div>
</div>
