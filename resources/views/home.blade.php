@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 class="display-4 .justify-content-md-center
        ">Welcome to Blog Site</h1>
        <p class="lead">Welcome to our new blog! We are excited to share our thoughts, ideas, and experiences with you.
            Our blog is a space where we can connect, learn, and grow together. Whether you're a first-time visitor or a
            longtime reader, we hope you find our content informative, thought-provoking, and engaging. We'll be
            covering a range of topics, from current events and industry news to personal stories and insights. So grab
            a cup of coffee, make yourself comfortable, and explore our site. We're glad you're here!</p>
        <hr class="my-4">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium tristique elit, vitae laoreet nisi
            euismod quis.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Register</a> <a
            class="btn btn-danger btn-lg" href="{{route('login')}}" role="button">Login</a>

    </div>
</div>
@endsection
