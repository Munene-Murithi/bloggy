@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 class="d-flex justify-content-center align-items-center">Welcome to Blog Site</h1>

        <p class="lead">Welcome to our new blog! We are excited to share our thoughts, ideas, and experiences with you.
            Our blog is a space where we can connect, learn, and grow together. Whether you're a first-time visitor or a
            longtime reader, we hope you find our content informative, thought-provoking, and engaging. We'll be
            covering a range of topics, from current events and industry news to personal stories and insights. So grab
            a cup of coffee, make yourself comfortable, and explore our site. We're glad you're here!</p>
        <hr class="my-4">
        <p class="d-flex justify-content-center align-items-center lead">Use the links below to signup or signin.</p><br><br>

        <div class="d-flex justify-content-center align-items-center">
            <a class="btn btn-outline-primary btn-md p-3" href="{{ route('register') }}" role="button">Register</a> <a
            class="btn btn-outline-success btn-md p-3 ms-2" href="{{route('login')}}" role="button">Login</a>
        </div>
    </div>
</div>
<div>
    
</div>
@endsection
