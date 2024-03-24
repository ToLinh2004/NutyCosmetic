@include('layouts.header')
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                @include('layouts.sidebar')
            </div>
            <div class="col-10">
                <div class="m-2">
                    @include('layouts.navbarAdmin')
                </div>
                <div>
                    @yield('title')
                    @yield('card')
                </div>
            </div>
        </div>
    </div>
</body>
</html>