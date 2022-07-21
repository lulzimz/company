<html style="scroll-behavior: smooth;" lang="en">
@extends('layouts.master_home')

@section('pageTitle', 'Show Post')
@section('home_content')


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2><a href="/blog" style="color: #fff;">Blog</a></h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Post</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container">

        <div class="row">

            <div class="col-lg-8 entries">

                <article class="entry entry-single" data-aos="fade-up">

                    <div class="entry-img">
                        <img src="{{ asset('frontend/assets/img/blog-1.jpg') }}" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <a aria-disabled="true">{{ $post->title }}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#author">{{ $post->author }}</a></li>
                            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a aria-disabled="true">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</a></li>
                            <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="#comments">{{ count($post->comments) }}</a></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p>
                            {{ $post->body }}
                        </p>
                        <blockquote>
                            <i class="icofont-quote-left quote-left"></i>
                            <p>
                                {{ $post->quote }}
                            </p>
                            <i class="las la-quote-right quote-right"></i>
                            <i class="icofont-quote-right quote-right"></i>
                        </blockquote>
                        <br></br>
                    </div>

                </article>
                <!-- End blog entry -->

                <div id="author" class="blog-author clearfix" data-aos="fade-up">
                    <img src="{{ asset('frontend/assets/img/blog-author.jpg') }}" class="rounded-circle float-left" alt="">
                    <h4>{{ $post->author }}</h4>
                    <div class="social-links">
                        <a href="https://twitters.com/#"><i class="icofont-twitter"></i></a>
                        <a href="https://facebook.com/#"><i class="icofont-facebook"></i></a>
                        <a href="https://instagram.com/#"><i class="icofont-instagram"></i></a>
                    </div>
                    <p>
                        Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                    </p>
                </div>
                <!-- End blog author bio -->

                <div id="comments"></div>

                <div id="comments"></div>
                <div class="blog-comments" data-aos="fade-up">

                    <h5 class="comments-count">
                        @php if(count($post->comments)==0) echo "No comments have been added for this post"; else echo count($post->comments) . " Comments"
                        @endphp </h5>
                    @foreach($post->comments as $comment)
                    <div class="comment clearfix">
                        <img src="{{ asset('frontend/assets/img/comments-1.jpg') }}" class="comment-img  float-left" alt="">
                        <h5>{{$comment->author->name}}</h5>
                        <time>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</time>
                        <p>
                            {{$comment->body}}
                        </p>
                    </div>
                    <!-- End comments -->
                    @endforeach



                    <div class="reply-form">
                        <h4>Leave a Reply</h4>
                        <p>Your comment will published in name: "User of Company" </p>
                        <form method="POST" action="/blog/{{ $post->id }}/comments">
                            @csrf
                            <div class="row">
                                <div class="col form-group">
                                    <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </form>
                    </div>

                </div><!-- End blog comments -->

            </div><!-- End blog entries list -->

            <div class="col-lg-4">
                <div class="sidebar" data-aos="fade-left">

                    <h3 class="sidebar-title">Categories</h3>
                    <div class="sidebar-item categories">
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="../../blog/category/{{ $category->id }}">{{ $category->name }} <span>({{ $category->count }})</span></a></li>
                            @endforeach
                        </ul>

                    </div>
                    <!-- End sidebar categories-->

                </div><!-- End sidebar -->
            </div><!-- End blog sidebar -->

        </div>

    </div>

</section><!-- End Blog Section -->
@endsection
</html>