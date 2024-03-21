<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.js')}}">
   <link rel="stylesheet" href="{{asset('css/about-us.css')}}">
   <link rel="stylesheet" href="{{asset('css/checkout-page.css')}}">
   <link rel="stylesheet" href="{{asset('css/footer.css')}}">
   <link rel="stylesheet" href="{{asset('css/form.css')}}">
   <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
   <link rel="stylesheet" href="{{asset('css/order-page.css')}}">
   <link rel="stylesheet" href="{{asset('css/pageloading.css')}}">
   <link rel="stylesheet" href="{{asset('css/products.css')}}">
   <link rel="stylesheet" href="{{asset('css/user-profile.css')}}">
   <link rel="stylesheet" href="{{asset('js/home.js')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href=" https://www.w3schools.com/w3css/4/w3.css">
 



    <title>Blue Cosmetic</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>

    <header class="head" id="myTopnav">
        <div class="logo-container">
            <img src="{{asset('images/logo.png')}}" style="width: 80px; height: 80px;">
        </div>
        <nav class="main-menu" id="myTopnav">
            <a href="{{route('home')}}">Home</a>
            <div>
                <div class="dropdown">
                    <div data-bs-toggle="dropdown" aria-expanded="false" style="margin-right:10px;">
                        <span class="underline-on-hover">Product</span>
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
                    
                </a>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="">Register</a></li>
                <li><a class="dropdown-item" href="">Login</a></li>
                <li><a class="dropdown-item" href="">Logout</a></li>
                <li><a class="dropdown-item" href="">Profile</a></li>
            </ul>
        </div>

    </header>
    <main style="min-height: 540px;">
        @yield('baner')
        @yield('content')
       
    </main>
    <div class="container-fluid mb-0  mt-4" style="padding: 0;" id="footer">
        <footer class="text-center text-lg-start text-white" style="background-color: #000;   box-shadow: 0px -5px 15px 0px rgba(0, 0, 0, 0.75);" id="main-footer">
            <section class="p-md-2">
                <div class="container text-center text-md-start mt-5">
    
                    <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold">Company name</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <img class="footer-qr-code" src="{{asset('images/qr.png')}}" alt="">
                            </p>
                            <div>
                                <i class="fa-brands fa-facebook icon-item"></i>
                                <i class="fa-brands fa-youtube icon-item"></i>
                                <i class="fa-brands fa-instagram icon-item"></i>
                            </div>
                        </div>
    
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
    
                            <h6 class="text-uppercase fw-bold">QUICK LINK</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <a href="#!" class="text-white">About us</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Service</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Conact us</a>
                            </p>
                        </div>
    
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold">PRODUCTS</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <a href="#!" class="text-white">Hair products</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Skincare</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Sensitive skin</a>
                            </p>
                        </div>
    
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class=" fw-bold">COMPANY</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <a href="#!" class="text-white">Lacotions</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Our Mission</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Career</a>
                            </p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <h6 class="text-uppercase fw-bold">CONTACT</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            
                        </div>
                    </div>
                </div>
            </section>
            <div class="text-center w3-black" id="footer-copyright">
                <a class="text-white" href="!#"> © 2023 Copyright: | Copyright belongs to Cosmetics Technology Investment
                    Company Limited</a>
            </div>
    
        </footer>
    
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="{{asset('js/home.js')}}"></script>
    
    </body>
    
    </html>