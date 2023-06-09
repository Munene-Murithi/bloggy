@extends("layouts.app")

@section("content")
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="card-header">
                            <h3 class="card-title text-center">Profile</h3>
                        </div>

                        <!-- Profile Photo -->
                        <div class="mb-4 mt-2">
                            <div class="text-center">
                                @if (Auth::user()->profile_photo)
                                    <img src="{{ asset('storage/uploads/' . Auth::user()->profile_photo) }}"
                                        alt="Profile Photo" class="rounded-circle profile-photo "
                                        style="height: 200px; width: 200px;">
                                @else
                                    <img src="{{ asset('storage/uploads/photo.jpg') }}"
                                        alt="Default Profile Photo"
                                        class="rounded-circle profile-photo img-thumbnail mt-3 mb-3"
                                        style="height: 200px; width: 200px;">
                                @endif
                            </div>
                        </div>

                        <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data"
                            class="mb-3">
                            @csrf
                            <div class="my-auto">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <label for="profile-photo" class="form-label">Choose Profile Photo:</label>
                                        <input type="file" id="profile-photo" name="profile_photo" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mt-4">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="d-flex align-items-center">
                            <hr class="flex-grow-1">
                            <span class="mx-2">
                                <h4>User Details</h4>
                            </span>
                            <hr class="flex-grow-1">
                        </div>

                        <!-- Profile Details -->

                        <div class="card p-3 col-8 mx-auto mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <strong>Name:</strong> {{ Auth::user()->name }}
                                </div>

                                <div class="mb-3">
                                    <strong>Phone:</strong> {{ Auth::user()->phone }}
                                </div>

                                <div class="mb-3">
                                    <strong>Email:</strong> {{ Auth::user()->email }}
                                </div>

                                <div class="mb-3">
                                    <strong>Last Login:</strong> {{ Auth::user()->last_login }}
                                    <p class="text-secondary" @disabled(true)>contact admin for detail changes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-header">My Posts</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @forelse ($posts as $post)
                            <div class="card mb-4 p-3">
                                <div class="card-body">
                                    <a href="{{ route('singlePost', $post->id) }}" class="card-link">
                                        <h5>{{ $post->title }}</h5>
                                        <p>{{ $post->body }}</p>
                                    </a>
                                    @if ($post->file)
                                        <img src="{{ asset('storage/uploads/' . $post->file) }}" alt="Post Image"
                                            class="img-fluid">
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                    @if (Auth::check() && Auth::user()->id === $post->user_id)
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ms-2">Delete</button>
                                        </form>
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="btn btn-success btn-sm ms-2">Edit</a>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p>No posts found.</p>
                        @endforelse

                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
