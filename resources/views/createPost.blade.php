@extends('layouts.app')

@section('content')
    <div class="container mt-5 col-6">
        <h1 class='mt-5 pt-5'>Create Post</h1>

        @if (session('success'))
        <div class="alert alert-success" id="flash-message">
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
            {{-- <div class="form-group">
                <label for="tags">Tags:</label>
                <select id="tags" name="tags" class="form-select">
                    <option selected disabled>Select a category</option>
                    <option value="beauty">Beauty</option>
                    <option value="news">News</option>
                    <option value="business">Business</option>
                    <option value="sports">Sports</option>
                    <option value="technology">Technology</option>
                    <option value="celebrity">Celebrity</option>
                    <option value="movies">Movies</option>
                    <option value="music">Music</option>
                    <option value="fashion">Fashion</option>
                    <option value="fitness">Fitness</option>
                    <option value="automotives">Automotives</option>
                    <option value="lifestyle">Lifestyle</option>
                </select>
                @if ($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
            </div> --}}

            <div class="form-group">
                <label for="tags">Tags:</label>
                <select id="tags" name="tags" class="form-select">
                    <option selected disabled>Select tags</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
            </div>
            
            
            
            
            
            

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
       
        
        
@endsection
