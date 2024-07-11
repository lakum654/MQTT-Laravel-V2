@extends('front.app')

@push('CSS')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <style>
        /* Importing fonts from Google */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        /* Reseting */


        .owl-carousel .owl-item {
            transition: all 0.3s ease-in-out;
        }

        .owl-carousel .owl-item .card {
            padding: 30px;
            position: relative;
        }

        .owl-carousel .owl-stage-outer {
            overflow-y: auto !important;
            padding-bottom: 40px;
        }

        .owl-carousel .owl-item img {
            height: 200px;
            object-fit: cover;
            border-radius: 6px;
        }

        .owl-carousel .owl-item .card .name {
            position: absolute;
            bottom: -20px;
            left: 39%;
            color: #101c81;
            font-size: 1.1rem;
            font-weight: 600;
            background-color: aquamarine;
            padding: 0.5rem 0.5rem;
            border-radius: 5px;
            box-shadow: 2px 3px 15px #3c405a;
        }

        .owl-carousel .owl-item .card {
            opacity: 0.2;
            transform: scale3d(0.8, 0.8, 0.8);
            transition: all 0.3s ease-in-out;
        }

        .owl-carousel .owl-item.active.center .card {
            opacity: 1;
            transform: scale3d(1, 1, 1);
        }

        .owl-carousel .owl-dots {
            display: inline-block;
            width: 100%;
            text-align: center;
        }

        .owl-theme .owl-dots .owl-dot span {
            height: 20px;
            background: #2a6ba3 !important;
            border-radius: 2px !important;
            opacity: 0.8;
        }

        .owl-theme .owl-dots .owl-dot.active span,
        .owl-theme .owl-dots .owl-dot:hover span {
            height: 13px;
            width: 13px;
            opacity: 1;
            transform: translateY(2px);
            background: #83b8e7 !important;
        }

        @media(min-width: 480.6px) and (max-width: 575.5px) {
            .owl-carousel .owl-item .card .name {
                left: 24%;
            }
        }

        @media(max-width: 360px) {
            .owl-carousel .owl-item .card .name {
                left: 30%;
            }
        }
    </style>
@endpush
@section('content')
    <main>
        <!-- Slider Area Start-->
        <div class="slider-area slider-bg ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider d-flex align-items-center slider-height ">
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-xl-5 col-lg-5 col-md-9 ">
                                <div class="hero__caption">
                                    <span data-animation="fadeInLeft" data-delay=".3s">Industrial Innovative
                                        Revolution</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".6s ">With Cutting Edge Technologies
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".8s">Supercharge your industries with
                                        advanced
                                        Technologies like IIOT / AI in Industry 4.0 </p>
                                    <!-- Slider btn -->
                                    <div class="slider-btns">
                                        <!-- Hero-btn -->
                                        <a data-animation="fadeInLeft" data-delay="1s" href="{{ route('front.products') }}"
                                            class="btn radius-btn">get started</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="hero__img d-none d-lg-block f-right">
                                    <img src="{{ asset('assets/img/hero/hero_right.png') }}" alt=""
                                        data-animation="fadeInRight" data-delay="1s">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider -->

            </div>
            <!-- Slider Shape -->
            <div class="slider-shape d-none d-lg-block">
                <img class="slider-shape1" src="{{ asset('assets/img/hero/top-left-shape.png') }}" alt="">
            </div>
        </div>
        <!-- Slider Area End -->
        <!-- Domain-search start -->

        <!-- Domain-search End -->
        <!--? Team -->
        <section class="team-area section-padding40 section-bg1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mb-105">
                            <h2>Our Exclusive's</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6"">
                        <div class="single-cat">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/img/icon/iiot.png') }}" height="75px" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#"> Industrial Internet of Things</a></h5>
                                <p>Cutting-edge IoT and IIoT products that connect and optimize your devices for
                                    seamless integration and enhanced efficiency.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-cat">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/img/icon/ai.png') }}" height="75px" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Artificial Intelligence</a></h5>
                                <p>Advanced AI solutions that drive innovation, automate processes, and deliver
                                    intelligent insights.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-cat">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/img/icon/web.png') }}" height="75px" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Web Technologies</a></h5>
                                <p> Robust web technologies designed to create dynamic, responsive, and user-friendly
                                    websites and applications.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-cat">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/img/icon/mob.png') }}" height="75px" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Mobile Applications</a></h5>
                                <p>High-performance mobile applications tailored to provide exceptional user experiences
                                    on both Android and iOS platforms.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-cat">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/img/icon/industry.png') }}" height="75px" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Industry 4.0</a></h5>
                                <p>Supercharge your industries with advanced
                                    Technologies like IIOT + AI in Industry 4.0 to your Real Time Darhboards </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-cat">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/img/icon/secur.png') }}" height="75px" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Secured Servers</a></h5>
                                <p>SuperSecured Servers with desired network LAN / WAN / MAN & Internet with advanced
                                    layers and protocals</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services End -->
        <!--? Pricing Card Start -->

        <!-- Pricing Card End -->
        <!--? About-1 Area Start -->
        <div class="about-area1 section-padding40">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-8 col-sm-10">
                        <!-- about-img -->
                        <div class="about-img ">
                            <img src="{{ asset('assets/img/gallery/about1.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <div class="about-caption ">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2 mb-30">
                                <h2>Dedicated Servers</h2>
                            </div>
                            <p class="mb-40">Reliable and high-performance dedicated servers designed to meet your
                                business / Industrial needs with maximum uptime and security.</p>
                            <ul>
                                <li>
                                    <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" viewBox="0 0 16 16">
                                            <text id="right" transform="translate(0 14)" fill="#11e276"
                                                font-size="16"
                                                font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'">
                                                <tspan x="0" y="0"></tspan>
                                            </text>
                                        </svg></span>
                                    <p> Unmatched Performance </p>
                                </li>
                                <li>
                                    <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" viewBox="0 0 16 16">
                                            <text id="right" transform="translate(0 14)" fill="#11e276"
                                                font-size="16"
                                                font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'">
                                                <tspan x="0" y="0"></tspan>
                                            </text>
                                        </svg></span>
                                    <p>Enhanced Security</p>
                                </li>
                                <li>
                                    <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" viewBox="0 0 16 16">
                                            <text id="right" transform="translate(0 14)" fill="#11e276"
                                                font-size="16"
                                                font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'">
                                                <tspan x="0" y="0"></tspan>
                                            </text>
                                        </svg></span>
                                    <p> Full Control and Customization</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About-1 Area End -->
        <!--? About-2 Area Start -->
        <div class="about-area1 pb-bottom">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <div class="about-caption about-caption3 mb-50">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2 mb-30">
                                <h2>Security IIoT Devices</h2>
                            </div>
                            <p class="mb-40">Advanced security IoT devices that protect and monitor your assets,
                                ensuring safety and peace of mind.</p>
                            <ul class="mb-30">
                                <li>
                                    <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" viewBox="0 0 16 16">
                                            <text id="right" transform="translate(0 14)" fill="#11e276"
                                                font-size="16"
                                                font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'">
                                                <tspan x="0" y="0"></tspan>
                                            </text>
                                        </svg></span>
                                    <p>Real-Time Monitoring</p>
                                </li>
                                <li>
                                    <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" viewBox="0 0 16 16">
                                            <text id="right" transform="translate(0 14)" fill="#11e276"
                                                font-size="16"
                                                font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'">
                                                <tspan x="0" y="0"></tspan>
                                            </text>
                                        </svg></span>
                                    <p>Advanced Encryption</p>
                                </li>
                                <li>
                                    <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" viewBox="0 0 16 16">
                                            <text id="right" transform="translate(0 14)" fill="#11e276"
                                                font-size="16"
                                                font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'">
                                                <tspan x="0" y="0"></tspan>
                                            </text>
                                        </svg></span>
                                    <p> Seamless Integration</p>
                                </li>


                            </ul>
                            <!-- <a href="#" class="btn">Explore</a> -->
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-8 col-sm-10">
                        <!-- about-img -->
                        <div class="about-img ">
                            <img src="{{ asset('assets/img/gallery/about2.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-area1 pb-bottom">
            <div class="container">
                <div class="section-tittle section-tittle2 mb-30">
                    <h2 class="text-center">Image Gallery</h2>
                </div>
            <div class="row gallery-item">
                @foreach ($galleries as $key => $gallery)
                <div class="col-md-4">
                    <a href="{{ asset('storage/'.$gallery->image)}}" class="img-pop-up">
                        <div class="single-gallery-image" style="background: url({{ asset('storage/'.$gallery->image)}});"></div>
                    </a>
                </div>
                @endforeach
                {{-- <div class="col-md-4">
                    <a href="assets/img/elements/g2.jpg" class="img-pop-up">
                        <div class="single-gallery-image" style="background: url(assets/img/elements/g2.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="assets/img/elements/g3.jpg" class="img-pop-up">
                        <div class="single-gallery-image" style="background: url(assets/img/elements/g3.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="assets/img/elements/g4.jpg" class="img-pop-up">
                        <div class="single-gallery-image" style="background: url(assets/img/elements/g4.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="assets/img/elements/g5.jpg" class="img-pop-up">
                        <div class="single-gallery-image" style="background: url(assets/img/elements/g5.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="assets/img/elements/g6.jpg" class="img-pop-up">
                        <div class="single-gallery-image" style="background: url(assets/img/elements/g6.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="assets/img/elements/g7.jpg" class="img-pop-up">
                        <div class="single-gallery-image" style="background: url(assets/img/elements/g7.jpg);"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="assets/img/elements/g8.jpg" class="img-pop-up">
                        <div class="single-gallery-image" style="background: url(assets/img/elements/g8.jpg);"></div>
                    </a>
                </div> --}}
            </div>
            </div>
        </div>

        <div class="section-tittle section-tittle2 mb-30">
            <h2 class="text-center">Clients</h2>
        </div>
        <div class="owl-carousel owl-theme mt-5">
            @foreach ($clients as $client)
            <div class="owl-item">
                <div class="card">
                    <div class="img-card">
                        <img src="{{ asset('storage/'.$client->image)}}"
                            alt="">
                    </div>
                    <div class="testimonial mt-4 mb-2">
                        {{-- <center>{{$client->title}}</center> --}}
                        {!! Str::limit($client->desc,150,'....') !!}
                    </div>
                    @if($client->title)
                    <div class="name">
                        <center>{{$client->title}}</center>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var silder = $(".owl-carousel");
            silder.owlCarousel({
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: false,
                items: 1,
                stagePadding: 20,
                center: true,
                nav: false,
                margin: 50,
                dots: true,
                loop: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    575: {
                        items: 2
                    },
                    768: {
                        items: 2
                    },
                    991: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            });
        });
    </script>
@endpush
