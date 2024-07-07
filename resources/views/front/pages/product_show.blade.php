@extends('front.app')


@section('content')
    <main>
        <!-- Slider Area Start-->
        <div class="slider-area slider-bg ">
            <!-- Single Slider -->
            <div class="single-slider d-flex align-items-center slider-height2">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-8 col-lg-9 col-md-12 ">
                            <div class="hero__caption hero__caption2 text-center">
                                <h1 data-animation="fadeInLeft" data-delay=".6s ">Choose Product which fit for you</h1>
                                <p data-animation="fadeInLeft" data-delay=".8s">Supercharge your industries with
                                    advanced
                                    Technologies like IIOT / AI in Industry 4.0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider Shape -->
            <div class="slider-shape d-none d-lg-block">
                <img class="slider-shape1" src="{{ asset('assets/img/hero/top-left-shape.png') }}" alt="">
            </div>
        </div>
        <!-- Slider Area End -->
        <!--? Pricing Card Start -->
        <section class="pricing-card-area pricing-card-area2 fix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="single-card text-center mb-30">
                            <div class="card-top">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    width="400px">
                                <h4>{{ $product->name }}</h4>
                                <p>Starting at</p>
                            </div>
                            <div class="card-mid">
                                <h4>{{ $product->price }} </h4>
                            </div>
                            <div class="card-bottom">
                                {!! $product->desc !!}
                                <br />
                                <a href="https://wa.me/+918297808410?text=Hello, Sir" class="borders-btn" target="_blank">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Card End -->
        <!--? About-1 Area Start -->

        <!-- About-1 Area End -->
        <!--? About-2 Area Start -->

        <!-- About-2 Area End -->

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

{{-- @push('JS')
    <script>
        function readMore(url) {
            alert(url);
        }
    </script>
@endpush --}}
