<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GHS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Home Services">
    <meta name="keywords" content="child care, cooking, cleaning, plumbing, carpentry, painting, electricity">    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assetsFront/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assetsFront/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assetsFront/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assetsFront/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assetsFront/css/service.css')}}" rel="stylesheet">
    <link href="{{ asset('assetsFront/css/worker.css')}}" rel="stylesheet">


    <!-- Include your WOW.js and its CSS if not included -->
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->

    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h1 class="m-0 "><img src="{{asset('images/house.png')}}" alt=""><span class="px-2">GHS</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto px-5 py-lg-0"  >
                <a style="margin-top:10px" href="{{ route('user_page') }}" class="nav-item nav-link px-2">Home</a>
                <a style="margin-top:10px" href="{{ route('aboutUs') }}" class="nav-item nav-link px-2">About Us</a>
                <a style="margin-top:10px" href="{{ route('contact') }}" class="nav-item px-2 nav-link">Contact Us</a>

                        @auth
                        <div style="margin-top:10px" class="nav-item px-2 dropdown">
                            <p href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</p>
                            <div  class="dropdown-menu  m-0">
                                <a class="nav-item nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit()">Sign Out</a>
                            <form action="{{ route('logout') }}" id="logout" method="post" style="display:none">
                                @csrf
                            </form>
                            </div>
                        </div>
                        @else
                            <a style="margin-top:10px" class="nav-item nav-link" href="{{ route('login') }}">{{ Lang::get('Sign In') }}</a>
                            <a style="margin-top:10px"class="nav-item nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endauth
            </div>
        </div>
    </nav>


@yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="text-white mb-4"><img src="{{asset('images/house.png')}}" alt="">GHS</h1>
                    <p>Here you will find everything you need to complete your household tasks. Book your favorite worker and do not hesitate</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, Amman, Jorden</p>
                    <p><i class="fa fa-phone-alt me-3"></i>0781949811</p>
                    <p><i class="fa fa-envelope me-3"></i>saifalden.mehdawi@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                </div>

            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">GSH</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="#">Saif Mehdawi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assetsFront/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('assetsFront/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('assetsFront/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('assetsFront/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assetsFront/js/main.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initial display
            filterWorkers();

            // Listen for changes in the city select element
            $('#cityFilter').change(function () {
                filterWorkers();
            });

            function filterWorkers() {
                // Get the selected city
                var selectedCity = $('#cityFilter').val().toLowerCase();

                // Show/hide workers based on the selected city
                $('.cardp').each(function () {
                    var workerCity = $(this).data('city').toLowerCase();
                    if (selectedCity === '' || selectedCity === 'all' || selectedCity === workerCity) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });
    </script>




    </body>

</html>
