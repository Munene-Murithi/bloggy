@extends('layouts.app')

@section('content')

<main id="main">
    <section class="single-post-content row">
        <div class="container justify-content-start col-md-7">
            <div class="row justify-content-center" style="overflow-y: auto; max-height: 600px;">
                <div class="col-md-8 post-content" data-aos="fade-up" >
                                @if (session('success'))
                                <div class="alert alert-success" id="flash-message">
                                    {{ session('success') }}
                                </div>
                                @endif
                    @foreach ($posts as $post)
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="{{ route('singlePost', $post->id) }}" class="card-link">
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
                            </a>
                            @if (Auth::check() && Auth::user()->id === $post->user_id)
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-2 toggle-comments mb-2">Delete</button>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success mt-2 toggle-comments mb-2">Edit</a>

                            </form>
                            @endif
                        
                                <div class="text-secondary" @disabled(true)>click post to view and make comments</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="mx-auto justify-content-between ms-5 me-5" >
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>
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
  
    
    
</main>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.toggle-comments').click(function () {
            $('.comments-container').toggle();
        });
    });
</script>
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

