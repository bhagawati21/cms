@extends('partials.main')
@section('main-container')
<main id="main">

  <section class="single-post-content">
    <div class="container">
      <div class="row">
        <div class="col-md-9 post-content" data-aos="fade-up">

          <!-- ======= Single Post Content ======= -->
          <div class="single-post">
            <div class="post-meta"><span class="date">{{ $post->name }}</span> <span class="mx-1">&bullet;</span>
              <span>{{ date('d-m-Y', strtotime($post->updated_at)) }}</span></div>
              <p>By {{ $post->uname }}</p>
            <h1 class="mb-5">{{ $post->title }}</h1>
            <!-- <p><span class="firstcharacter">L</span>orem ipsum dolor sit, amet consectetur adipisicing elit. Ratione officia sed, suscipit distinctio, numquam omnis quo fuga ipsam quis inventore voluptatum recusandae culpa, unde doloribus saepe labore alias voluptate expedita? Dicta delectus beatae explicabo odio voluptatibus quas, saepe qui aperiam autem obcaecati, illo et! Incidunt voluptas culpa neque repellat sint, accusamus beatae, cumque autem tempore quisquam quam eligendi harum debitis.</p> -->
            <img src="{{ asset('storage/'.$post->image) }}" alt="Post Image" class="img-fluid">

            <br>
            <br>

            {!! html_entity_decode($post->body) !!}
          </div><!-- End Single Post Content -->

          <!-- ======= Comments ======= -->
          <div class="comments">
            <h5 class="comment-title py-4">Comments</h5>
            @foreach($comments as $comment)
              @if($comment->user_id != null)
                @php
                  $user = DB::table('users')->where('id', '=', $comment->user_id)->first();
                @endphp
                <div class="comment d-flex">
                  <div class="flex-shrink-0">
                    <div class="avatar avatar-sm rounded-circle">
                      <img class="avatar-img" src="{{ asset('storage/users/default.png') }}" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="flex-shrink-1 ms-2 ms-sm-3">
                    <div class="comment-meta d-flex">
                      <h6 class="me-2">{{ $user->name }}</h6>
                      <span class="text-muted">{{ date('d-m-Y h:i A', strtotime($comment->comment_date)) }}</span>
                    </div>
                    <div class="comment-body">
                      {{ $comment->content }}
                    </div>
                  </div>
                </div>
                <br>
              @else
                <div class="comment d-flex">
                  <div class="flex-shrink-0">
                    <div class="avatar avatar-sm rounded-circle">
                      <img class="avatar-img" src="{{ asset('storage/users/default.png') }}" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="flex-shrink-1 ms-2 ms-sm-3">
                    <div class="comment-meta d-flex">
                      <h6 class="me-2">{{ $comment->author }}</h6>
                      <span class="text-muted">{{ date('d-m-Y h:i A', strtotime($comment->comment_date)) }}</span>
                    </div>
                    <div class="comment-body">
                      {{ $comment->content }}
                    </div>
                  </div>
                </div>
                <br>
              @endif
            @endforeach
          </div><!-- End Comments -->

          <!-- ======= Comments Form ======= -->
          <div class="row justify-content-center mt-5">

            <div class="col-lg-12">
              <h5 class="comment-title">Leave a Comment</h5>
              <div class="row">
                <form action="/comment" method="post">
                  @csrf
                  @if(Auth::check())
                    <strong>{{ __("Comment as ".Auth::user()->name) }}</strong>
                    <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                  @else
                    <div class="col-lg-12">
                      <div>
                        <label for="comment-name">Name</label>
                        <input type="text" name="author" class="form-control" id="comment-name" placeholder="Enter your name" required>
                      </div>
                      <div>
                        <label for="comment-email">Email</label>
                        <input type="text" name="email" class="form-control" id="comment-email" placeholder="Enter your email" required>
                      </div>
                    </div>
                  @endif
                  <div class="col-12 mb-3">
                    <input type="text" name="post_id" value="{{ $post->id }}" hidden>
                    <label for="comment-message">Message</label>
                    <textarea class="form-control" name="content" id="comment-message" placeholder="Enter your name" cols="30"
                      rows="10" required></textarea>
                  </div>
                  <div class="col-12">
                    <input type="submit" class="btn btn-primary" value="Post comment">
                  </div>
                </form>
              </div>
            </div>
          </div><!-- End Comments Form -->

        </div>
        <div class="col-md-3">
          <h3>Latest Posts</h3>
          <br>
          @foreach($latestPosts as $post)
            @if($post->category_id != null)
              @php
                $c = $post->name;
              @endphp
            @else
              @php
                $c = "Uncategorized";
              @endphp
            @endif
            <div class="post-entry-1 border-bottom">
              <div class="post-meta"><span class="date">{{ $c }}</span> <span class="mx-1">&bullet;</span>
                <span>{{ date('d-m-Y', strtotime($post->updated_at)) }}</span></div>
              <h2 class="mb-2"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
              <span class="author mb-3 d-block">By {{ $post->uname }}</span>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection