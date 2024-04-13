<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.js') }}">
    <link rel="stylesheet" href="{{ asset('css/about-us.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/order-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pageloading.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user-profile.css') }}">
    <link rel="stylesheet" href="{{ asset('js/home.js') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href=" https://www.w3schools.com/w3css/4/w3.css">




    <title>Blue Cosmetic</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>

    <header class="head" id="myTopnav">
        @include('partials.header')

    </header>
    <main style="min-height: 540px;">
        @yield('baner')
        @yield('content')

    </main>
    <div class="container-fluid mb-0  mt-4" style="padding: 0;" id="footer">
        <footer class="text-center text-lg-start text-white"
            style="background-color: #000;   box-shadow: 0px -5px 15px 0px rgba(0, 0, 0, 0.75);" id="main-footer">
         @include('partials.footer')

        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/home.js') }}"></script>



</body>

</html>
