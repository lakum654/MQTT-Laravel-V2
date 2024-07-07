@extends('front.app')

@push('CSS')
<style>
     li > p {
        color:#fff !important;
    }
</style>
@endpush
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
                            <h1 data-animation="fadeInLeft" data-delay=".6s ">Why Choose Us ?</h1>
                            {{-- <p data-animation="fadeInLeft" data-delay=".8s">Supercharge your industries with
                                advanced
                                Technologies like IIOT / AI in Industry 4.0</p> --}}
                        </div>
                    </div>
                </div>

                <div class="about-area1 section-padding40">
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="about-caption" style="color: white;">
                                    <ul>
                                        <li>
                                            <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <text id="right" transform="translate(0 14)" fill="#11e276" font-size="16" font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'"><tspan x="0" y="0"></tspan></text>
                                              </svg></span>
                                            <p> <strong>Innovation:</strong> Our team is dedicated to pushing the boundaries of technology, continuously innovating to bring the best solutions to our clients. </p>
                                        </li>
                                        <li>
                                            <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <text id="right" transform="translate(0 14)" fill="#11e276" font-size="16" font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'"><tspan x="0" y="0"></tspan></text>
                                              </svg></span>
                                            <p><strong>Expertise:</strong> With years of experience in software and hardware development, we offer unparalleled expertise across multiple domains.
                                            </p>
                                        </li>
                                        <li>
                                            <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <text id="right" transform="translate(0 14)" fill="#11e276" font-size="16" font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'"><tspan x="0" y="0"></tspan></text>
                                              </svg></span>
                                            <p> <strong>Customization:</strong> We understand that every client is unique, and we tailor our solutions to meet specific business requirements.
                                            </p>
                                        </li>
                                        <li>
                                            <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <text id="right" transform="translate(0 14)" fill="#11e276" font-size="16" font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'"><tspan x="0" y="0"></tspan></text>
                                              </svg></span>
                                            <p> <strong>Quality Assurance:</strong> Our rigorous testing and quality assurance processes ensure that our products are reliable and perform to the highest standards.
                                            </p>
                                        </li>
                                        <li>
                                            <span class="mr-3"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <text id="right" transform="translate(0 14)" fill="#11e276" font-size="16" font-family="FontAwesome5Free-Solid, 'Font Awesome 5 Free'"><tspan x="0" y="0"></tspan></text>
                                              </svg></span>
                                            <p> <strong>Support:</strong> Our rigorous testing and quality assurance processes ensure that our products are reliable and perform to the highest standards.
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Shape -->
        <div class="slider-shape d-none d-lg-block">
            <img class="slider-shape1" src="{{ asset('assets/img/hero/top-left-shape.png')}}" alt="">
        </div>
    </div>
    <!-- Slider Area End -->




</main>

@endsection
