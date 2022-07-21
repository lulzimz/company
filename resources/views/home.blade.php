@extends('layouts.master_home')
@include('layouts.body.slider')

@section('pageTitle', 'Index')
@section('home_content')

<!-- ======= About Us Section ======= -->
<section id="about-us" class="about-us">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>About Us</strong></h2>
        </div>

        <div class="row content">
            <div class="col-lg-6" data-aos="fade-right">
                <h2> {{ $abouts->title ?? 'None' }}</h2>
                <h3>{{ $abouts->short_dis ?? 'None' }}</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                <p>
                    {{ $abouts->long_dis ?? 'None'  }}
                </p>
            </div>
        </div>

    </div>
</section>
<!-- End About Us Section -->

<!-- ======= Services Section ======= -->
<x-services/>     
<!-- End Services Section -->

<!-- ======= MultiImage Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>MultiImage</h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">
            @foreach($images as $image)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{$image->image}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>App 1</h4>
                    <p>App</p>
                    <a href="{{$image->image}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End MultiImage Section -->

<!-- ======= Our Clients Section ======= -->
<section id="clients" class="clients">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Brands</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
            @foreach($brands as $brand)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="client-logo">
                    <img src="{{ asset($brand->brand_image) }}" class="img-fluid" alt="" style="width: 120px; height: 80px;">
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Our Clients Section -->
@endsection