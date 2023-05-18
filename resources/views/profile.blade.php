@extends("layouts.app")

@section("content")
<head>
    <style>
        .profile-photo {
          max-width: 200px;
          max-height: 200px;
          width: 100%;
          height: auto;
          object-fit: cover;
          padding-top: 5px;
        }
      </style>
    
</head>
<body class="">

  <div class="container mt-5 pt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body text-center">
                <div class="card-header">
                    <h3 class="card-title mb-4">Profile</h3>
                </div>

            <!-- Profile Photo -->
            <div class="mb-4">
                <img src="./assets/img/person-6.jpg" alt=""
                class="rounded-circle profile-photo">
            </div>

            <!-- Profile Details -->
            <div class="mb-3 form-floating">
                  <label class="input-group-text">Name:</label>
                  <input type="text" id="name" class="form-control" value="John Doe"  placeholder="holser">
              </div>
              
              

            <div class="mb-3">
              <label for="phone" class="form-label">Phone:</label>
              <input type="text" id="phone" class="form-control" value="123-456-7890" readonly>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" id="email" class="form-control" value="john@example.com" readonly>
            </div>

            <div class="mb-3">
              <label for="last-login" class="form-label">Last Login:</label>
              <input type="text" id="last-login" class="form-control" value="2023-05-18 10:30 AM" readonly>
            </div>

            <!-- Profile Photo Upload -->
            <div class="mb-3">
              <label for="profile-photo" class="form-label">Change Profile Photo:</label>
              <input type="file" id="profile-photo" class="form-control">
            </div>

            <!-- Profile Photo Change Button -->
            <button type="button" class="btn btn-primary">Upload</button>
               
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/js/bootstrap.bundle.min.js"></script>
</body>

@endsection
