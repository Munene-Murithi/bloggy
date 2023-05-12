<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./public/assets/img/favicon.ico">

    <title>{{ config('app.name') }}</title>
</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between ms-2">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('home') }}">Bloggy</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home Page</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Dashboard</a>
              </li>
            </ul>
            <span class="nav-item dropdown me-4">@auth
              <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              
                <li><a class="dropdown-item" href="#">Phone: {{ Auth::user()->phone }}</a></li>
                <li><a class="dropdown-item" href="#">email: {{ Auth::user()->email }}</a></li>
                <li><hr class="dropdown-divider"></li>
              </ul>                 
            </span>
            @endauth
            
            <ul class="navbar-nav me-3">
              @auth
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}">logout</a>
                </li>
                  @endauth
                @guest
                  <li class="nav-item">
                    <a class=nav-link href="{{ route('login') }}">Login</a></li>
                   <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}">Signup</a><li>

                    @endguest
                </div>
           
              </ul>
        </div>
      </nav>
      @yield('content')


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>