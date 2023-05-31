<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icolin" type="image/png" href="{{ asset('icon1.png') }}">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aoss.css') }}" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="{{ asset('assets/css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <title>{{ config('app.name') }}</title>
</head>

<body class="rounded-3 m-3 p-3">
    <div class="border">
        <nav id="navbar" class="navbar">
            <ul>
                @auth
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('createPost') }}">New Post</a></li>
                <li><a href="{{ route('profile') }}">Profile</a></li>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Signup</a>
                    </li>
                    @endguest
                </div>

                <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
    </div>

    <div class="container mt-5 col-6 rounded-3">
        <h1>Edit Post</h1>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label fw-bold">Body</label>
                <textarea class="form-control" id="body" name="body" rows="5">{{ $post->body }}</textarea>
                @error('body')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file" class="form-label fw-bold p-3">File</label>
                @if ($post->file)
                <img src="{{ asset('storage/uploads/' . $post->file) }}" alt="Post Image" class="img-product" class="img-product" style="max-width: 400px; max-height: 400px;">
                @else
                <p>No file uploaded.</p>
                @endif
                <input type="file" class="form-control m-3" id="file" name="file">
                @error('file')
                <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary mx-auto">Update</button>
        </form>
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
