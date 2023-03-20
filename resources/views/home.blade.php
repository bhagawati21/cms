@extends('partials.main')

@section('main-container')
<main id="main">

  <!-- ======= Hero Slider Section ======= -->
  <section id="hero-slider" class="hero-slider">
    <div class="container-md" data-aos="fade-in">
      <div class="row">
        <div class="col-12">
          <div class="swiper sliderFeaturedPosts">
            <div class="swiper-wrapper">
              @foreach($fposts as $post)
              <div class="swiper-slide">
                @php
                  $i = asset('storage/'.$post->image);
                @endphp
                <a href="/posts/{{ $post->slug }}" class="img-bg d-flex align-items-end" style="background-image: url('{{ $i }}');">
                  <div class="img-bg-inner">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->excerpt }}</p>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
            <div class="custom-swiper-button-next">
              <span class="bi-chevron-right"></span>
            </div>
            <div class="custom-swiper-button-prev">
              <span class="bi-chevron-left"></span>
            </div>

            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero Slider Section -->

  <!-- ======= Post Grid Section ======= -->
  <section id="posts" class="posts">
    <div class="container" data-aos="fade-up">
      <div class="row g-5">
        <div class="col-lg-12">
          <div class="row g-5">
            <div class="col-lg-8 border-start custom-border">
              <h3>Other posts</h3>
              @foreach($posts as $post)
                <div class="post-entry-1">
                  <a href="/posts/{{$post->slug}}"><img src="{{asset('/storage/.$post->image')}}" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">{{$post->name}}</span> <span class="mx-1">&bullet;</span> <span>{{ date('d-m-Y', strtotime($post->updated_at)) }}</span></div>
                  <h2><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h2>
                </div>
              @endforeach
            </div>

            <!-- Trending Section -->
            <div class="col-lg-4">

              <div class="trending">
                <h3>Latest Posts</h3>
                <ul class="trending-post">
                  @php 
                    $i = 1;
                  @endphp
                  @foreach($lposts as $post)
                  <li>
                    <a href="/posts/{{ $post->slug }}">
                      <span class="number">{{ $i++ }}</span>
                      <h3>{{ $post->title }}</h3>
                      <span class="author">{{ $post->uname }}</span>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>

            </div> <!-- End Trending Section -->

          </div>
        </div>

      </div> <!-- End .row -->
    </div>
  </section> <!-- End Post Grid Section -->

</main><!-- End #main -->
@endsection

