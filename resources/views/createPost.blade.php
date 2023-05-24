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
                <img src="" alt="" class="img-product" />

                <input type="file" class="form-control" id="file" name="file">
                @error('file')
            <div class="text-danger">{{ $message }}</div>
        @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
    
@endsection
