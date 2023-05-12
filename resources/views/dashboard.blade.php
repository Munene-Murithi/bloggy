@extends('layouts.app')

@section('content')

<body>
    
    <div class="container justify-content-center lead">
        <div class="row justify-content-center">
                    
            <div class="col-md-6">
                <!-- Displaying posts -->
                <h2 class="text-center pt-3">Posts</h2>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Post Title</h5>
                        <p class="card-text">Post content goes here..</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                        <div class="card mb-3 mt-3">
                            <div class="card-body">
                                <label for="comments">comments</label>
                                <h6 class="card-title">{{ Auth::user()->name }}</h6>

                                <div class="input-group mb-3">
                                    <textarea class="form-control form-control-lg" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"></textarea>
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Send</button>
                                </div>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
                
        </div>
    </div>

</body>
@endsection
