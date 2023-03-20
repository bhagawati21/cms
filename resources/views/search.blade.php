@extends('partials.main')
@section('main-container')
<main id="main">

  <section class="single-post-content">
    <div class="container">
      <div class="row">
        <div class="col-md-9 mx-auto post-content" data-aos="fade-up">
          <h4>Search : {{ $search }}</h4>
          <h4>Posts related to the searched query</h4>
          @foreach($posts as $post)
            <div class="post-entry-1">
              <a href="/posts/{{$post->slug}}"><img src="/storage/{{ $post->image }}" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">{{ $post->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ date('d-m-Y', strtotime($post->updated_at)) }}</span></div>
              <h2 class="mb-2"><a href="/posts/{{$post->slug}}">{{ $post->title }}</a></h2>
              <p class="mb-2 d-block">{{ $post->excerpt }}... <a href="/posts/{{ $post->slug }}" style="color:blue; text-decoration: underline;">Read more</a></p>
              <strong><span class="author d-block">By {{ $post->uname }}</span></strong>
            </div>
            <br>
          @endforeach
          @if($posts->isEmpty())
            <h3 class="text-danger">No posts related to this search query</h3>
          @endif

          <!-- Displaying related categories -->
          <br>
          <h4>Related categories</h4>
          @foreach($categories as $category)
            <a style="color:blue; text-decoration:underline;" href="/category/{{ $category->slug }}">{{ $category->name }}</a>
            <br>
          @endforeach
          @if($categories->isEmpty())
            <h3 class="text-danger">No category related to this search query</h3>
          @endif
        </div>
        <!-- <div class="col-md-3">

        </div> -->
      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection