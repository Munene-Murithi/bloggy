@extends('layouts.app')

@section('content')

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center text-success"> <!-- Added 'text-center' class -->
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @if(session('fail'))
                                <div class="alert alert-danger">
                                    {{ session('fail') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group form-check mt-3"> <!-- Added 'text-center' class -->
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <div class="d-grid gap-2  pt-3">
                                <button type="submit" class="btn btn-outline-success mx-auto">Login</button> <!-- Added 'mx-auto' class -->
                            </div>
                            <div class="card-footer mt-3 text-center">
                                Don't have an account? Register <a href="{{ route('register') }}">here</a>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-jKZgF4E3qHgEn3pN9XyAOvOK8KsWzNRkILnLwpexnOXv2d+kKjzTdhTlT9Xo0MKQ" crossorigin="anonymous"></script>
</body>

@endsection
