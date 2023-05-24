<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icolin" type="image/png" href="./icon1.png">
    <link href="./assets/img/favicon.png" rel="icon">
    <link href="./assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="./assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="./assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="./assets/vendor/aos/aoss.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="./assets/css/variables.css" rel="stylesheet">
    <link href="./assets/css/main.css" rel="stylesheet">


    <title>{{ config('app.name') }}</title>

    <style>
        .pagination {
            font-size: 14px; /* Adjust the font size to make it smaller */
        }

        .pagination .page-link {
            padding: 0.25rem 0.5rem; /* Adjust the padding to reduce the size of each link */
        }
    </style>
</head>

<body>

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="./assets/img/logo.png" alt="">
                <h1>{{ config("app.name") }}</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    @auth
                    <li><a href="dashboard">Dashboard</a></li>
                    <li><a href="createPost">New Post</a></li>
                    <li><a href="profile">Profile</a></li>
                    @endauth

                    <div>
                        <!-- Move the div inside the ul element -->
                        @auth


                        <li class="dropdown">
                            <!-- Add the dropdown class to the li element -->
                            <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- Add the dropdown-menu class -->
                                <li><a class="dropdown-item" href="#">Phone: {{ Auth::user()->phone }}</a></li>
                                <li><a class="dropdown-item" href="#">Email: {{ Auth::user()->email }}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>

                            </ul>
                        </li>
                        @endauth
                        @guest
                        <ul>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Signup</a>
                            </li>
                        </ul>
                        @endguest
                    </div>

                    <li><a href="aboutUs">About Us</a></li>
                    <li><a href="contact">Contact</a></li>

                </ul>
            </nav><!-- .navbar -->

            <div class="position-relative">
                <a href="https://github.com/randdridley" target="_blank" rel="noopener noreferrer" class="mx-2"><span class="bi-github"></span></a>
                <a href="https://www.twitter.com/randdridley" target="_blank" rel="noopener noreferrer" class="mx-2"> <span class="bi-twitter"></span></a>
                <a href="https://www.instagram.com/_sam.iy_" target="_blank" rel="noopener noreferrer" class="mx-2"><span class="bi-instagram"></span></a>

                <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
                <i class="bi bi-list mobile-nav-toggle"></i>

                <!-- ======= Search Form ======= -->
                <div class="search-form-wrap js-search-form-wrap">
                    <form action="#" class="search-form">
                        <span class="icon bi-search"></span>
                        <input type="text" placeholder="Search" class="form-control">
                        <button class="btn js-search-close"><span class="bi-x"></span></button>
                    </form>
                </div><!-- End Search Form -->

            </div>

        </div>

    </header>

    @yield('content')
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="./assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="./assets/vendor/aos/aos.js"></script>
    <script src="./assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="./assets/js/main.js"></script>
</body>
