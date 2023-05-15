@extends('layouts.app')

@section('content')
<body class="bg-white pt-5">
    

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-3">
                <div class="card-header text-center text-success">
                    <h4>{{ __('Register') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" >{{ __('Name') }}</label>


                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group row">
                            
                            <label for="email">Email address</label>


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group row">

                            <label for="phone" >{{ __('Phone') }}</label>


                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone') }}" autocomplete="phone">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group row">
                            <label for="password"
                                >{{ __('Password') }}</label>


                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group row">
                             <label for="email">Repeat Password </label>

                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new-password">

                        </div>

                        <div class="form-group row">
                            <div class="p-3">
                                <div class="form-check">
                                    <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox"
                                        name="terms" id="terms" {{ old('terms') ? 'checked' : '' }}>

                                    <label for="terms">
                                        I agree to the <a href="{{ route('terms') }}">terms and conditions</a>.
                                    </label>

                                    @error('terms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group text-center">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-success mx-auto">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        
                        </div >
                        <div class="card-footer mt-4 text-center">
                            Do you already have an account? Login <a href="{{ route('login') }}">here</a>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
