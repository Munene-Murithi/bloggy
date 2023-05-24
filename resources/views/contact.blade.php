@extends('layouts.app')
@section('content')

<body>

 

  <main id="main">
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Contact us</h1>
          </div>
        </div>

        <div class="row gy-4">

          <div class="col-md-4">
            <div class="info-item">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>Nairobi, Kenya</address>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-4">
            <div class="info-item info-item-borders">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+254797925090">+254797925090</a></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-4">
            <div class="info-item">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">sammymunene22@gmail.com</a></p>
            </div>
          </div><!-- End Info Item -->

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer pt-3 mt-3">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
            <h3 class="footer-heading">About {{ config("app.name") }}</h3>
            <p>
            Our blog is a space where we can connect, learn, and grow together. Whether you're a first-time visitor or a
            longtime reader, we hope you find our content informative, thought-provoking, and engaging. We'll be
            covering a range of topics, from current events and industry news to personal stories and insights. So grab
            a cup of coffee, make yourself comfortable, and explore our site. We're glad you're here! 
            </p>          
            <p><a href="aboutUs" class="footer-link-more">Learn More</a></p>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Navigation</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="/"><i class="bi bi-chevron-right"></i> Home</a></li>
              <li><a href="dashboard"><i class="bi bi-chevron-right"></i> Dashboard</a></li>
              <li><a href="aboutUs"><i class="bi bi-chevron-right"></i> About us</a></li>
              <li><a href="contact"><i class="bi bi-chevron-right"></i> Contact</a></li>
            </ul>
          </div>
          
          

          
        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
              © Copyright <strong><span>{{ config("app.name") }}</span></strong>. All Rights Reserved
            </div>

            

          </div>

          <div class="col-md-6">
            <a href="https://github.com/randdridley" target="_blank" rel="noopener noreferrer" class="mx-2"><span class="bi-github"></span></a>
            <a href="https://www.twitter.com/randdridley" target="_blank" rel="noopener noreferrer" class="mx-2"> <span class="bi-twitter"></span></a>
            <a href="https://www.instagram.com/_sam.iy_" target="_blank" rel="noopener noreferrer" class="mx-2"><span class="bi-instagram"></span></a>
            </div>

          </div>

        </div>

      </div>
    </div>

  </footer>

</body>
@endsection