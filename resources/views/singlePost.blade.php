

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
    <link rel="icolin" type="image/png" href="./icon1.png">


    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="../assets/css/variables.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aoss.css" rel="stylesheet">

</head>
@extends('layouts.app')
@section('content')

@if (session('success'))
    <div class="alert alert-success col-6 mt-2 " id="flash-message">
        {{ session('success') }}
    </div>
    @endif

<div class="row">
<div class="card col-6 m-3 mt-0 shadow" style="overflow-y: auto; max-height: 600px;">
    
    <body class="m-3  mt-5 pt-5">
      
    <div class="card-body">
        
        <div class="d-flex align-items-center mb-3">
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
        <h5>{{ $post->title }}</h5>
        <p>{{ $post->body }}</p>
        @if ($post->file)
        <img src="{{ asset('storage/uploads/' . $post->file) }}" alt="Post Image">
        <p>{{ $post->created_at->diffForHumans() }}</p>
        @endif

        @if (Auth::check() && Auth::user()->id === $post->user_id)
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger m-2">Delete</button>
           
             <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success m-2 toggle-comments">Edit</a>

        </form>
        @endif
        <div class="col-md-12">
            <form action="{{ route('storeComment') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <textarea name="body" rows="2" cols="50" class="form-control mt-2"
                        placeholder="Write a comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
        <div class="col-md-12">
            <div class="comments-container mt-2 mb-2">
                @foreach ($post->comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <h4>
                            <div class="d-flex align-items-center mb-3">
                                @if ($comment->user->profile_photo)
                                <img src="{{ asset('storage/uploads/' . $comment->user->profile_photo) }}"
                                    alt="Profile Photo" class="rounded-circle profile-photo"
                                    style="height: 40px; width: 40px;">
                                @else
                                <img src="{{ asset('storage/uploads/photo.jpg') }}"
                                    alt="Default Profile Photo"
                                    class="rounded-circle profile-photo"
                                    style="height: 40px; width: 40px;">
                                @endif
                                <span class="ms-2">{{ $comment->user->name }}</span>
                            </div>
                        </h4>
                        <div class="comment-container d-flex justify-content-between">
                            <div class="comment">{{ $comment->body }}</div>
                            <div class="time">{{ $comment->created_at->diffForHumans() }}</div>
                            @if (Auth::check() && Auth::user()->id === $comment->user_id)
                            <a href="{{ route('comments.edit', $comment) }}" class="btn btn-success">Edit</a>

                            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-right">Delete</button>
                            </form>

                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="btn btn-success mt-2 toggle-comments mb-2">Toggle
                {{ $post->comments->count() }} Comments</button>
                
        </div>
    </div>
</div>
<div class="col-5 m-3 mt-">
    <div class="container col-10">
        <h1 class='mt-5 pt-5'>Create your own Post</h1>

       

        <form action="{{ route('storePost') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control" id="title" name="title" >
                @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            {{-- <div class="mb-6">
                <label class=" fw-bold">Tag</label>
                <div class="row">
                    @php
                        $tagChunks = $tags->chunk(ceil($tags->count() / 3));
                    @endphp
            
                    @foreach ($tagChunks as $tagColumn)
                        <div class="col mb-3">
                            @foreach ($tagColumn as $tag)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag{{ $tag->id }}">
                                    <label class="form-check-label" for="tag{{ $tag->id }}">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div> --}}
            
            

            <div class="mb-3">
                <label for="body" class="form-label fw-bold">Body</label>
                <textarea class="form-control" id="body" name="body" rows="5" ></textarea>
                @error('body')
            <div class="text-danger">{{ $message }}</div>
        @enderror
            </div>
            <div class="mb-3">
                <label for="file" class="form-label fw-bold">File</label>
                <img src="" alt="" class="img-product m-3" id="preview-img" style="max-width: 500px; max-height: 500px;">
                <input type="file" class="form-control" id="file" name="file" onchange="previewFile(event)">
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
    
        <script>
            function previewFile(event) {
                var previewImg = document.getElementById('preview-img');
                var file = event.target.files[0];
                var reader = new FileReader();
        
                reader.onloadend = function() {
                    previewImg.src = reader.result;
                }
        
                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    previewImg.src = "";
                }
            }
        </script>
</div>

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
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="./assets/js/main.js"></script>
<script>
    // Check if the flash message element exists
    var flashMessage = document.getElementById('flash-message');
    if (flashMessage) {
        // Fade out the flash message after 3 seconds (adjust the duration as needed)
        setTimeout(function() {
            flashMessage.style.opacity = '0';
            // Remove the flash message from the DOM after fading out
            setTimeout(function() {
                flashMessage.remove();
            }, 1000);
        }, 3000);
    }
</script>

</body>
</html>
@endsection