<footer>
    <div class="footer-wrappr " data-background="{{ asset('assets/img/gallery/footer-bg.png')}}">
        <div class="footer-area footer-padding ">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo mb-25">
                                <a href="/"><img src="{{ asset('assets/img/logo/logo2_footer.png')}}"
                                        alt=""></a>
                            </div>

                            <!-- social -->
                            <div class="footer-social mt-50">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Company</h4>
                                <ul>
                                    <li><a href="{{ route('front.why-choose-us') }}" class="{{Route::is('front.why-choose-us') ? 'text-warning' : ''}}">Why choose us</a></li>
                                    <li><a target="1" href="https://g.page/r/CfGOtJbUmc5CEB0/review">
                                            Review</a></li>
                                    <li><a href="#">Customers</a></li>
                                    <li><a href="{{ route('front.blog')}}" class="{{Route::is('front.blog') || Route::is('front.blog.*') ? 'text-warning' : ''}}">Blog</a></li>
                                    <li><a target="0" href="https://forms.gle/4g1ZccvRa11cQUBVA">Careers</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Products</h4>
                                <ul>
                                    <li><a href="#">IOT / IIOT</a></li>
                                    <li><a href="#">Artificial Intelligence </a></li>
                                    <li><a href="#">Web Technologies</a></li>
                                    <li><a href="#">Mobile Apps</a></li>
                                    <li><a href="#">Other</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="{{ route('front.products')}}" class="{{Route::is('front.products') || Route::is('front.product.show') ? 'text-warning' : ''}}">Products</a></li>
                                    <li><a href="{{ route('front.services')}}" class="{{Route::is('front.services') || Route::is('front.services.show') ? 'text-warning' : ''}}">Services</a></li>
                                    <li><a href="#">Customers</a></li>
                                    <li><a href="#">Quality</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This website is made by <a
                                        href="https://nighatechglobal.com" target="_blank">NighaTech Global</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
