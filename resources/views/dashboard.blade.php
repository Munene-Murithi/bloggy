@extends('layouts.app')
@section('content')

<main id="main">

    <section class="single-post-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 post-content" data-aos="fade-up">
                    @foreach ($posts as $post)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3>{{ $post->user->name }}</h3>
                            <h5>{{ $post->title }}</h5>
                            <p>{{ $post->body }}</p>
                            @if ($post->file)
                            <img src="{{ asset('storage/uploads/' . $post->file) }}" alt="Post Image" class="img-fluid">
                            <p> {{ $post->created_at->diffForHumans() }}</p>

                            @endif

                            @if (Auth::check() && Auth::user()->id === $post->user_id)
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-2 toggle-comments mb-2">Delete</button>
                            </form>
                            @endif

                            <div class="col-md-12">
                              @php
                              $users = array();
                              @endphp
                              @foreach ($post->comments as $comment)
                                  @php
                                  $name = $comment->user->name ?? 'Unknown User';
                                  $user_comments = $users[$name] ?? array();
                                  array_push($user_comments, $comment);
                                  $users[$name] = $user_comments;
                                  @endphp
                              @endforeach
                              @if (count($users) > 0)
                                  <div class="comments-container mt-2 mb-2" style="display: none;">
                                      @foreach ($users as $name => $user_comments)
                                          <div class="card mb-2">
                                              <div class="card-body">
                                                  <h4>{{ $name }}</h4>
                                                  @foreach ($user_comments as $comment)
                                                  <div class="comment-container d-flex justify-content-between">
                                                    <div class="comment">{{ $comment->body }}</div>
                                                    <div class="time">{{ $comment->created_at->diffForHumans() }}</div>

                                                          @if (Auth::check() && Auth::user()->id === $comment->user_id)
                                                              <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                                                  @csrf
                                                                  @method('DELETE')
                                                                  <button type="submit" class="btn btn-danger float-right">Delete</button>
                                                              </form>
                                                          @endif
                                                      </div>
                                                  @endforeach
                                              </div>
                                          </div>
                                      @endforeach
                                  </div>
                                  <button class="btn btn-primary mt-2 toggle-comments mb-2">Toggle {{ $post->comments->count() }}
                                      Comments</button>
                              @endif
                          </div>
                          <div class="col-md-12">
                              <form action="{{ route('storeComment') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="post_id" value="{{ $post->id }}">
                                  <div class="form-group">
                                      <textarea name="body" rows="2" cols="50" class="form-control mt-2" placeholder="Write a comment"></textarea>
                                  </div>
                                  <button type="submit" class="btn btn-primary mt-2">Submit</button>
                              </form>
                          </div>
                          </div>
                          </div>
                          @endforeach
                          </div>
                          </div>
                          </section>
                          
                          

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.toggle-comments').click(function () {
                $('.comments-container').toggle();
            });
        });
    </script>
</main>
@endsection