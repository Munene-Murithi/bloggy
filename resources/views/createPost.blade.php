@extends('layouts.app')

@section('content')
    <div class="container mt-5 col-6">
        <h1>Create Post</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('storePost') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
            </div>

            <div class="mb-3">

                <label for="file" class="form-label">File</label>
                <img src="" alt="" class="img-product" />

                <input type="file" class="form-control" id="file" name="file">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
    
@endsection
