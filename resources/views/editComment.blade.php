@extends("layouts.app")
@section("content")



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
    <link href="{{ asset('../assets/css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('../assets/css/main.css') }}" rel="stylesheet">

    <title>{{ config('app.name') }}</title>
</head>
<body class="mt-5 pt-5">
    
<!-- Bootstrap 5 CSS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">
<div class='container col-5'>
    <h4 class='mt-3'>Edit comment</h4>
<!-- Your existing form code here -->
@if (isset($comment))
    <form action="{{ route('comments.update', $comment) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Comment content field -->
        <div class="mb-3">
            <label for="body" class="form-label">Comment Content</label>
            <textarea class="form-control" name="body" rows="4" cols="50">{{ $comment->body }}</textarea>
        </div>

        <!-- Update button -->
        <button type="submit" class="btn btn-primary">Update Comment</button>
    </form>
@endif
</div>
<!-- Bootstrap 5 JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('../assets/js/main.js') }}"></script>
</body>
    
@endsection