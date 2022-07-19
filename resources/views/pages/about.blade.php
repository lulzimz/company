<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>About - Company UBT</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('frontend/assets/img/favicon.png ')}}" rel="icon">
    <link href="{{asset('frontend/assets/img/apple-touch-icon.png ')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css ')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/icofont/icofont.min.css ')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css ')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/animate.css/animate.min.css ')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/venobox/venobox.css ')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css ')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/aos/aos.css ')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/remixicon/remixicon.css ')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('frontend/assets/css/style.css ')}}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    @include('layouts.body.header')
    <!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>About</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>About</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= About Us Section ======= -->
        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">
                <div class="row content">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h2> {{ $about->title ?? 'None' }}</h2>
                        <h3>{{ $about->short_dis ?? 'None' }}</h3>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                        <p>
                            {{ $about->long_dis ?? 'None'  }}
                        </p>
                    </div>
                </div>
            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Our <strong>Team</strong></h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">
                    @foreach($users as $user)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img alt="No Image to show" width="200" height="200" src="{{asset($user->profile_photo_path)}}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{$user->name}}</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>

            </div>
        </section><!-- End Our Team Section -->

        <!-- ======= Our Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Our Clients</h2>
                </div>

                <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
                    @foreach($clients as $client)

                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="client-logo">
                            <img src="{{asset($client->client_image)}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Our Clients Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.body.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js ')}}"></script>
    <script src="{{asset('frontend/assets/vendor/jquery/jquery.min.js ')}}"></script>
    <script src="{{asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js ')}}"></script>
    <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js ')}}"></script>
    <script src="{{asset('frontend/assets/vendor/jquery-sticky/jquery.sticky.js ')}}"></script>
    <script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js ')}}"></script>
    <script src="{{asset('frontend/assets/vendor/venobox/venobox.min.js ')}}"></script>
    <script src="{{asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js ')}}"></script>
    <script src="{{asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js ')}}"></script>
    <script src="{{asset('frontend/assets/vendor/aos/aos.js ')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('frontend/assets/js/main.js ')}}"></script>

</body>

</html>