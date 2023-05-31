@extends('layouts.app')

@section('content')
<body class="pt-5">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center text-success">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" required>
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <div class="d-grid gap-2 pt-3">
                                <button type="submit" class="btn btn-outline-success mx-auto">Login</button>
                            </div>
                            <div class="card-footer mt-3 text-center">
                                Don't have an account? Register <a href="{{ route('register') }}" class="text-decoration-underline fw-bol text-success">here.</a>
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
