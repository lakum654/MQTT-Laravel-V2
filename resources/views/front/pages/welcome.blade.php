@extends('front.app')


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
                                    <a data-animation="fadeInLeft" data-delay="1s" href="industries.html"
                                        class="btn radius-btn">get started</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="hero__img d-none d-lg-block f-right">
                                <img src="{{ asset('assets/img/hero/hero_right.png')}}" alt=""
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
            <img class="slider-shape1" src="{{ asset('assets/img/hero/top-left-shape.png')}}" alt="">
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
                            <img src="{{ asset('assets/img/icon/iiot.png')}}" height="75px" alt="">
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
                            <img src="{{ asset('assets/img/icon/ai.png')}}" height="75px" alt="">
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
                            <img src="{{ asset('assets/img/icon/web.png')}}" height="75px" alt="">
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
                            <img src="{{ asset('assets/img/icon/mob.png')}}" height="75px" alt="">
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
                            <img src="{{ asset('assets/img/icon/industry.png')}}" height="75px" alt="">
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
                            <img src="{{ asset('assets/img/icon/secur.png')}}" height="75px" alt="">
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
                        <img src="{{ asset('assets/img/gallery/about1.png')}}" alt="">
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
                                <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <text id="right" transform="translate(0 14)" fill="#11e276" font-size="16" font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'"><tspan x="0" y="0"></tspan></text>
                                  </svg></span>
                                <p> Unmatched Performance </p>
                            </li>
                            <li>
                                <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <text id="right" transform="translate(0 14)" fill="#11e276" font-size="16" font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'"><tspan x="0" y="0"></tspan></text>
                                  </svg></span>
                                <p>Enhanced Security</p>
                            </li>
                            <li>
                                <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <text id="right" transform="translate(0 14)" fill="#11e276" font-size="16" font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'"><tspan x="0" y="0"></tspan></text>
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
                                <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <text id="right" transform="translate(0 14)" fill="#11e276" font-size="16" font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'"><tspan x="0" y="0"></tspan></text>
                                  </svg></span>
                                <p>Real-Time Monitoring</p>
                            </li>
                            <li>
                               <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <text id="right" transform="translate(0 14)" fill="#11e276" font-size="16" font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'"><tspan x="0" y="0"></tspan></text>
                              </svg></span>
                                <p>Advanced Encryption</p>
                            </li>
                            <li>
                                <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <text id="right" transform="translate(0 14)" fill="#11e276" font-size="16" font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'"><tspan x="0" y="0"></tspan></text>
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
                        <img src="{{ asset('assets/img/gallery/about2.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
