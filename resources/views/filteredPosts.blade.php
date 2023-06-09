<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
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
    <link rel="icolin" type="image/png" href="{{ asset('icon1.png') }}">


    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="/assets/css/variables.css" rel="stylesheet">
    <link href="../../../../assets/css/main.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aoss.css" rel="stylesheet">

</head>
@extends('layouts.app')
@section('content')
<body>
    <section class="single-post-content row">
        <div class="container justify-content-center col-md-7 mt-5 pt-5" style="display: flex; flex-flow: row wrap;">
            <div class="row justify-content-center" style="overflow-y: auto; max-height: 600px;">
                <div class="col-md-10 post-content" data-aos="fade-up">
                    @if (session('success'))
                        <div class="alert alert-success" id="flash-message">
                            {{ session('success') }}
                        </div>
                    @endif
                    @foreach ($posts as $post)
                        <div class="card mb-4 text-decoration-none">
                            <div class="card-body text-decoration-none">
                                <a href="{{ route('singlePost', $post->id) }}" class="tecard-link text-decoration-none text-dark">
                                    <div class="d-flex align-items-center mb-3 text-decoration-none">
                                        @if ($post->user->profile_photo)
                                            <img src="{{ asset('storage/uploads/' . $post->user->profile_photo) }}"
                                                alt="Profile Photo" class="rounded-circle profile-photo"
                                                style="height: 40px; width: 40px;">
                                        @else
                                            <img src="{{ asset('storage/uploads/photo.jpg') }}"
                                                alt="Default Profile Photo"
                                                class="rounded-circle profile-photo img-thumbnail mt-3 mb-3"
                                                style="height: 40px; width: 40px;">
                                        @endif
                                        <h3 class="ms-2">{{ $post->user->name }}</h3>
                                    </div>
                                    <h5 class="">{{ $post->title }}</h5>
                                    <p class="">{{ $post->body }}</p>
                                    @if ($post->file)
                                        <img src="{{ asset('storage/uploads/' . $post->file) }}" alt="Post Image"
                                            class="img-fluid">
                                    @endif
                                    <p>{{ $post->created_at->diffForHumans() }}</p>
                                </a>
                                @if (Auth::check() && Auth::user()->id === $post->user_id)
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-2 toggle-comments mb-2">Delete</button>
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="btn btn-success mt-2 toggle-comments mb-2">Edit</a>
                                    </form>
                                @endif
                                <div class="text-secondary" @disabled(true)>click post to view and make comments</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mx-auto justify-content-between p-3">
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>
         
            <div class="col-4 p-3 ms-4 mx-auto card">
                <h3 class="card-header text-center">Categories</h3>
                <table class="table table-striped">
                    <tbody>
                        @foreach ($tags as $tag)
                        <tr>
                            <td><a href="{{ route('posts.by.tag', ['tag' => $tag->name]) }}" class="text-dark text-decoration-none" style="font-size: 16px;">{{ $tag->name }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </section>
    
    {{-- <div class="container p-5 m-5">
        <h1>Posts by Tag: {{ $tag->name }}</h1>

        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->body }}</p>
                </div>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.toggle-comments').click(function () {
                $('.comments-container').toggle();
            });
        });
    </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
  integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>

@endsection
