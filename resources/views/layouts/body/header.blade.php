 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
     <div class="container d-flex align-items-center">

         <h1 class="logo mr-auto"><a href="{{('/')}}"><span>Com</span>pany</a></h1>

         <nav class="nav-menu d-none d-lg-block">
             <ul>
                 <li class="active"><a href="{{('/')}}">Home</a></li>
                 <li><a href="{{ route('MultiImage') }}">Images</a></li>
                 <li><a href="{{ route('about') }}">About</a></li>
                 <li><a href="{{ route('contact') }}">Contact</a></li>

             </ul>
         </nav><!-- .nav-menu -->

         <div class="header-social-links">
             <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
             <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
             <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
             <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
         </div>

     </div>
 </header><!-- End Header -->