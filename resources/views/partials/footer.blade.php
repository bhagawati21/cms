  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
            <h3 class="footer-heading">About {{ setting('site.title') }}</h3>
            <p>{{ setting('site.description') }}</p>
            {{-- <p><a href="/about" class="footer-link-more">Learn More</a></p> --}}
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Navigation</h3>
            <ul class="footer-links list-unstyled">
              {{menu('user', 'bootstrap')}}
            </ul>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Categories</h3>
            <ul class="footer-links list-unstyled">
              @php 
                $categories = DB::table('categories')->select("*")->get();
              @endphp
              @foreach($categories as $category)
                <li><a href="/category/{{$category->slug}}"><i class="bi bi-chevron-right"></i> {{$category->name}}</a></li>       
              @endforeach
            </ul>
          </div>

          <div class="col-lg-4">
            <h3 class="footer-heading">Social Media</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="#" class="mt-5"><span class="bi-facebook text-light"> Facebook</span></a></li>
              <li><a href="#" class="mt-5"><span class="bi-twitter text-light"> Twitter</span></a></li>
              <li><a href="#" class="mt-5"><span class="bi-instagram text-light"> Instagram</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{url('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{url('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{url('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('assets/js/main.js')}}"></script>

</body>

</html>