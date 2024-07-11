@extends('front.app')


@push('CSS')
<style>
    .blog_details {
        overflow: hidden;
        padding: 20px;
        /* border: 1px solid #ddd; */
        border-radius: 5px;
    }

    .blog-desc {
        word-wrap: break-word;
        white-space: pre-wrap;
    }
</style>
@endpush
@section('content')
    <main>
        <!-- Slider Area Start-->
        <div class="slider-area slider-bg ">
            <!-- Single Slider -->
            <div class="single-slider d-flex align-items-center slider-height3">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-8 col-lg-9 col-md-12 ">
                            <div class="hero__caption hero__caption3 text-center">
                                <h1 data-animation="fadeInLeft" data-delay=".6s ">Blog Details</h1>
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
        <!--? Blog Area Start -->
        <section class="blog_area single-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ asset('storage/' . $blog->image) }}" alt="">
                            </div>
                            <div class="blog_details">
                                <h2 style="color: #2d2d2d;">{{ $blog->title }}</h2>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="fa fa-user"></i> {{ $blog->tags }}</a></li>
                                    {{-- <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li> --}}
                                </ul>
                                <div class="blog-desc">
                                    {!! $blog->desc !!}
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <form action="#">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder='Search Keyword'
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Search Keyword'">
                                            <div class="input-group-append">
                                                <button class="btns" type="button"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Search</button>
                                </form>
                            </aside>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title" style="color: #2d2d2d;">Category</h4>
                                <ul class="list cat-list">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ route('front.blog.category', ['category' => $category->id]) }}"
                                                class="d-flex">
                                                <p>{{ $category->name }}</p>
                                                <p>({{ $category->blogs->count() }})</p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title" style="color: #2d2d2d;">Recent Post</h3>
                                @foreach ($recent_blogs as $blog)
                                    <div class="media post_item">
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="post" width="80px">
                                        <div class="media-body">
                                            <a href="{{ route('front.blog.show', ['slug' => $blog->slug]) }}">
                                                <h3 style="color: #2d2d2d;">{{ $blog->title }}</h3>
                                            </a>
                                            <p>{{ $blog->created_at->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </aside>
                            {{-- <aside class="single_sidebar_widget tag_cloud_widget">
                                <h4 class="widget_title" style="color: #2d2d2d;">Tag Clouds</h4>
                                <ul class="list">
                                    <li>
                                        <a href="#">project</a>
                                    </li>
                                    <li>
                                        <a href="#">love</a>
                                    </li>
                                    <li>
                                        <a href="#">technology</a>
                                    </li>
                                    <li>
                                        <a href="#">travel</a>
                                    </li>
                                    <li>
                                        <a href="#">restaurant</a>
                                    </li>
                                    <li>
                                        <a href="#">life style</a>
                                    </li>
                                    <li>
                                        <a href="#">design</a>
                                    </li>
                                    <li>
                                        <a href="#">illustration</a>
                                    </li>
                                </ul>
                            </aside> --}}
                            {{-- <aside class="single_sidebar_widget instagram_feeds">
                                <h4 class="widget_title" style="color: #2d2d2d;">Instagram Feeds</h4>
                                <ul class="instagram_row flex-wrap">
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </aside> --}}
                            {{-- <aside class="single_sidebar_widget newsletter_widget">
                                <h4 class="widget_title" style="color: #2d2d2d;">Newsletter</h4>
                                <form action="#">
                                    <div class="form-group">
                                        <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Subscribe</button>
                                </form>
                            </aside> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End -->
    </main>
@endsection
