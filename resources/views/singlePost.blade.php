<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icolin" type="image/png" href="./icon1.png">
    <link href="./assets/img/favicon.png" rel="icon">
    <link href="./assets/img/apple-touch-icon.png" rel="apple-touch-icon">

</head>
<body class="p-5 col-6 mx-auto">
<div class="card mb-4">
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
        <img src="{{ asset('storage/uploads/' . $post->file) }}" alt="Post Image"
            class="img-fluid">
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
            <button class="btn btn-primary mt-2 toggle-comments mb-2">Toggle
                {{ $post->comments->count() }} Comments</button>
                
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.toggle-comments').click(function () {
                $('.comments-container').toggle();
            });
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>