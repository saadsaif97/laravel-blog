<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="keywords" content="">

      <title>
         @yield('title')
      </title>

      <!-- Styles -->
      <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">



      <!-- Favicons -->
      <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
      <link rel="icon" href="{{ asset('img/favicon.png') }}">
   </head>

   <body>

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
         <div class="container">

            <div class="navbar-left">
               <button class="navbar-toggler" type="button">&#9776;</button>
               <a class="navbar-brand" href="/">
                  <img class="logo-light" src="{{ asset('img/logo-light.png') }}" alt="logo">
               </a>
            </div>

            <section class="navbar-mobile">
               <span class="navbar-divider d-mobile-none"></span>

               <ul class="nav nav-navbar">

                  <li class="nav-item">
                     <a class="nav-link" href="#">Projects <span class="arrow"></span></a>
                     <nav class="nav">
                        <a class="nav-link" href="#">Laravel</a>
                        <a class="nav-link" href="#">React.js</a>
                        <a class="nav-link" href="#">Gatsby.js</a>
                        <a class="nav-link" href="#">Next.js</a>
                     </nav>
                  </li>

                  <li class="nav-item">
                     <a class="nav-link" href="#">Portfolio</a>
                  </li>

               </ul>
            </section>

            @auth
            <form action="{{ route('logout') }}" method="post">
               @csrf
               <button type="submit" class="btn btn-xs btn-round btn-secondary">Logout</button>
            </form>
            @else
            <a class="btn btn-xs btn-round btn-success" href="{{ route('login') }}">Login</a>
            @endauth

         </div>
      </nav><!-- /.navbar -->


      @yield('header')


      @yield('content')


      <!-- Footer -->
      <footer class="footer">
         <div class="container">
            <div class="row gap-y align-items-center">

               <div class="col-6 col-lg-6">
                  <a href="/"><img src="{{ asset('img/logo-dark.png') }}" alt="logo"></a>
               </div>

               <div class="col-6 col-lg-6 text-right order-lg-last">
                  <div class="social">
                     <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>
                     <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>
                     <a class="social-instagram" href="#"><i class="fa fa-instagram"></i></a>
                     <a class="social-dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                  </div>
               </div>

            </div>
         </div>
      </footer><!-- /.footer -->


      <!-- Scripts -->
      <script src="{{ asset('js/page.min.js') }}"></script>
      <script src="{{ asset('js/script.js') }}"></script>
      <!-- For discus comment count -->
      <script id="dsq-count-scr" src="//blog-cms-7.disqus.com/count.js" async></script>
      @yield('scripts')

      <!-- addthis (sharing tool) -->
      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6089bda0dfd6553b"></script>
   </body>

</html>
