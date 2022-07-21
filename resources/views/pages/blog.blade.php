@extends('layouts.master_home')

@section('pageTitle', 'Posts')
@section('home_content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><a href="/blog" style="color: #fff;">Blog</a></h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Posts</li>
            </ol>
        </div>

    </div>
</section>
<!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container">

        <div class="row">

            <div class="col-lg-8 entries">

                @if(count($posts) === 0)
                <article class="entry" style="margin-top:5%" data-aos="fade-up">
                    <h2 class="entry-title" style="text-align:center; margin:30px 30px 30px 30px">
                        NO POSTS TO SHOW
                    </h2>
                </article>
                @endif

                @foreach($posts as $post)
                <article class="entry" data-aos="fade-up">

                    <h2 class="entry-title">
                        <a href="../blog/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-user"></i> {{ $post->author }}</li>
                            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</li>
                            <li class="d-flex align-items-center"><i class="icofont-comment"></i>{{ count($post->comments) }}</li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p>
                            {{ $post->body }}
                        </p>
                        <div class="read-more">
                            <a href="../blog/{{ $post->id }}">Read More</a>
                        </div>
                    </div>

                </article>
                <!-- End blog entry -->
                @endforeach

            </div><!-- End blog entries list -->

            <div class="col-lg-4">

                <div class="sidebar" data-aos="fade-left">

                    <h3 class="sidebar-title">Search</h3>
                    <div class="sidebar-item search-form">
                        <form method="GET" action="/blog">
                            <input type="text" name="search" placeholder="Find a post" value="{{ request('search') }}">
                            <button type="submit"><i class="icofont-search"></i></button>
                        </form>

                    </div><!-- End sidebar search formn-->

                    <h3 class="sidebar-title">Categories</h3>
                    <div class="sidebar-item categories">
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="/blog/category/{{$category->id}}">{{ $category->name }} <span>({{ $category->count }})</span></a></li>
                            @endforeach
                        </ul>

                    </div><!-- End sidebar categories-->

                    <h3 class="sidebar-title">Recent Posts</h3>
                    <div class="sidebar-item recent-posts">
                        <div class="post-item clearfix">
                            <img src="{{ asset('frontend/assets/img/blog-recent-posts-1.jpg') }}" alt="">
                            <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>

                        <div class="post-item clearfix">
                            <img src="{{ asset('frontend/assets/img/blog-recent-posts-2.jpg') }}" alt="">
                            <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>



                    </div><!-- End sidebar recent posts-->

                    <h3 class="sidebar-title">Tags</h3>
                    <div class="sidebar-item tags">
                        <ul>
                            <li><a href="/tags/app">App</a></li>
                            <li><a href="/tags/it">IT</a></li>
                            <li><a href="/tags/business">Business</a></li>
                            <li><a href="/tags/mac">Mac</a></li>
                            <li><a href="/tags/design">Design</a></li>
                            <li><a href="/tags/office">Office</a></li>
                            <li><a href="/tags/creative">Creative</a></li>
                            <li><a href="/tags/studio">Studio</a></li>
                            <li><a href="/tags/smart">Smart</a></li>
                            <li><a href="/tags/tips">Tips</a></li>
                            <li><a href="/tags/marketing">Marketing</a></li>
                        </ul>

                    </div><!-- End sidebar tags-->

                </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->

        </div>

    </div>
</section><!-- End Blog Section -->

@endsection