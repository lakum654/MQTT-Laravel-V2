 <!-- ? Preloader Start -->
 <div id="preloader-active">
     <div class="preloader d-flex align-items-center justify-content-center bg-dark">
         <div class="preloader-inner position-relative ">
             <div class="preloader-circle bg-dark"></div>
             <div class="preloader-img pere-text">
                 <img src="{{ asset('assets/img/logo/loder.png')}}" alt="">
             </div>
         </div>
     </div>
 </div>
 <!-- Preloader Start -->
 <header>
     <!-- Header Start -->
     <div class="header-area header-transparent">
         <div class="main-header ">
             <div class="header-bottom  header-sticky">
                 <div class="container-fluid">
                     <div class="row align-items-center">
                         <!-- Logo -->
                         <div class="col-xl-2 col-lg-2">
                             <div class="logo">
                                 <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo/logo.png')}}" alt=""></a>
                             </div>
                         </div>
                         <div class="col-xl-10 col-lg-10">
                             <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                 <!-- Main-menu -->
                                 <div class="main-menu d-none d-lg-block">
                                     <nav>
                                         <ul id="navigation">
                                             <li><a href="{{ url('/') }}" class="{{ Route::is('front.index') ? 'text-warning' : '' }}">Home</a></li>
                                             <li><a href="{{ route('front.products') }}"  class="{{ Route::is('front.products') || Route::is('front.product.show') ? 'text-warning' : '' }}">Products</a></li>
                                             <li><a href="{{ route('front.services')}}" class="{{ Route::is('front.services') || Route::is('front.services.show') ? 'text-warning' : '' }}">Services</a></li>
                                             <li><a target="_blank"
                                                     href="https://forms.gle/4g1ZccvRa11cQUBVA">Careers</a></li>


                                             @if (Route::has('login'))
                                                 @auth
                                                     <li class="margin-left "><a href="{{ url('admin/home') }}"
                                                            class="">DashBoard </a></li>

                                                     <a class="" href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                         Logout bro
                                                     </a>

                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                         class="d-none">
                                                         @csrf
                                                     </form>
                                                 @else
                                                     @if (Route::has('register'))
                                                         <!-- Button -->
                                                         <li class=" margin-left "><a href="{{ route('register') }}"
                                                                 class="">Sign Up</a></li>
                                                     @endif
                                                     <li class="button-header"><a href="{{ route('login') }}"
                                                             class="btn">Sign In</a></li>

                                                 @endauth
                                             @endif
                                         </ul>
                                     </nav>
                                 </div>
                             </div>
                         </div>
                         <!-- Mobile Menu -->
                         <div class="col-12">
                             <div class="mobile_menu d-block d-lg-none"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Header End -->
 </header>
