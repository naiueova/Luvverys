@extends('landing-page.landing.main')
@section('content')
    <!--slide banner section start-->
    <div class="hero_banner_section hero_banner2 d-flex align-items-center mb-60" data-bgimg="{{ asset('assets/img/bg/Banner_full.png')}}">
        <div class="container">
            <div class="hero_banner_inner">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero_content hero_content2">
                            <h3 class="wow fadeInUp text-grey" data-wow-delay="0.1s" data-wow-duration="1.1s"> Up To
                                Sale <span> 50% Off</span> </h3>
                            <h1 class="wow fadeInUp text-grey" data-wow-delay="0.2s" data-wow-duration="1.2s">We Bake
                                With <br>
                                Love.</h1>
                            <a class="btn btn-link wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s"
                                href="{{ route('shop') }}">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--slider area end-->

    <!-- featured banner section start -->
    <div class="featured_banner_section mb-100">
        <div class="container-fluid">
            <div class="section_title text-center mb-55">
                <h2>Shop by Categories</h2>
            </div>
            <div class="row featured_banner_inner slick__activation"
                data-slick='{
        "slidesToShow": 3,
        "slidesToScroll": 1,
        "arrows": true,
        "dots": false,
        "autoplay": false,
        "speed": 300,
        "infinite": true ,
        "responsive":[
          {"breakpoint":768, "settings": { "slidesToShow": 2 } },
          {"breakpoint":500, "settings": { "slidesToShow": 1 } }
         ]
    }'>
                @foreach ($productCategories as $pc)
                    <div class="col-lg-4">
                        <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                            <div class="featured_banner_thumb">
                                <a href="{{ route('shop', $pc->slug) }}"><img src="{{ asset('storage/' . $pc->image_url) }}"
                                        alt=""></a>
                            </div>
                            <div class="featured_banner_text d-flex justify-content-between align-items-center">
                                <h3><a href="{{ route('shop', $pc->slug) }}">{{ $pc->category_name }}</a></h3>
                                <span>({{ $pc->products_count }})</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- featured banner section end -->

    <!-- product section start -->
    <div class="product_section mb-80 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
        <div class="container">
            <div class="product_header">
                <div class="section_title text-center">
                    <h2>New Products</h2>
                </div>
                <div class="product_tab_button">
                    <ul class="nav justify-content-center" role="tablist" id="nav-tab">
                        <li>
                            <a class="active" data-toggle="tab" href="#features" role="tab" aria-controls="features"
                                aria-selected="false">Our Features </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content product_container">
                <div class="tab-pane fade show active" id="features" role="tabpanel">
                    <div class="product_gallery">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="{{ route('product.detail', $product->slug) }}"><img
                                                        src="{{ asset('storage/' . $product->image1_url) }}"
                                                        alt=""></a>
                                                <div class="action_links">
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                title="Add to Wishlist"><span class="pe-7s-like"></span></a>
                                                        </li>
                                                        <li class="quick_button"><a href="#" title="Quick View"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal_box_{{ $product->id }}">
                                                                <span class="pe-7s-look"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content text-center">
                                                <h4><a href="{{ route('product.detail', $product->slug) }}">{{ $product->product_name }}</a></h4>
                                                <div class="price_box">
                                                    <span class="current_price">Rp
                                                        {{ number_format($product->price, 0, ',', '.') }}</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            @endforeach
                            @foreach ($products as $product)
                                @include('landing-page.landing.modal', ['product' => $product])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product section end -->

    <!-- banner section  start -->
    <div class="banner_section banner_section2 mb-140 padding-l-r-92">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_banner wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <div class="banner_thumb">
                            <a href="#"><img src="{{ asset('assets/img/bg/banner3_luvverys.webp')}}" alt=""></a>
                            <div class="banner_text">
                                <h3><span>Buy</span> Now!!</h3>
                                <h2>Best Quality <br>
                                    Products</h2>
                                <a class="btn btn-link" href="{{ route('shop') }}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_banner wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                        <div class="banner_thumb">
                            <a href="#"><img src="{{ asset('assets/img/bg/banner4_luvverys.webp')}}" alt=""></a>
                            <div class="banner_text">
                                <h3><span>Buy</span> Now!!</h3>
                                <h2>Sweet &  <br>
                                    Spicy Pastry</h2>
                                <a class="btn btn-link" href="{{ route('shop') }}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_banner wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                        <div class="banner_thumb">
                            <a href="#"><img src="{{ asset('assets/img/bg/banner5_luvverys.webp')}}" alt=""></a>
                            <div class="banner_text">
                                <h3><span>Buy</span> Now!!</h3>
                                <h2>Premimium <br>
                                    Ingredients</h2>
                                <a class="btn btn-link" href="{{ route('shop') }}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner section  end -->

    <!-- service section start-->
    <div class="service_section services_style2 service_container mb-86">
        <div class="container">
            <div class="section_title text-center mb-55">
                <h2>Best Moment</h2>
                <p>At Luvverys Bakery, every product is made with love
                    <br> and designed to bring happiness to any moment. </p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="services_section_inner d-flex justify-content-between">
                        <div class="single_services one text-center wow fadeInUp" data-wow-delay="0.1s"
                            data-wow-duration="1.1s">
                            <div class="services_thumb">
                                <img src="{{ asset('assets/img/others/service5_luvverys.png')}}" alt="">
                            </div>
                            <div class="services_content">
                                <h3>Breakfast</h3>
                                <p>Begin your day with a delightful bakery. Our treats are the perfect morning boost.  </p>
                            </div>
                        </div>
                        <div class="single_services three text-center wow fadeInUp" data-wow-delay="0.3s"
                            data-wow-duration="1.3s">
                            <div class="services_thumb">
                                <img src="{{ asset('assets/img/others/service6_luvverys.png')}}" alt="">
                            </div>
                            <div class="services_content">
                                <h3>Family Gatherings</h3>
                                <p>Share love and joy with our cakes at family gatherings. Cherish memories together.</p>
                            </div>
                        </div>
                        <div class="single_services two text-center wow fadeInUp" data-wow-delay="0.2s"
                            data-wow-duration="1.2s">
                            <div class="services_thumb">
                                <img src="{{ asset('assets/img/others/service7_luvverys.png')}}" alt="">
                            </div>
                            <div class="services_content">
                                <h3>Celebration</h3>
                                <p>Crafted for birthdays, anniversaries, or any special occasion, our cakes bring joy.</p>
                            </div>
                        </div>
                        <div class="single_services four text-center wow fadeInUp" data-wow-delay="0.4s"
                            data-wow-duration="1.4s">
                            <div class="services_thumb">
                                <img src="{{ asset('assets/img/others/service8_luvverys.png')}}" alt="">
                            </div>
                            <div class="services_content">
                                <h3>Holiday Festivities</h3>
                                <p>Elevate your holidays with our festive treats. Enjoy sweetness in every celebration.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service section end-->

    <!-- banner fullwidth section start -->
    <div class="deals_banner_section padding-l-r-92 mb-105 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
        <div class="deals_banner_bg" data-bgimg="{{ asset('assets/img/bg/Banner_full2.png')}}">
            <div class="container">
                <div class="deals_banner_inner">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6 col-md-6 offset-md-6">
                            <div class="banner_discount_text deals_banner_text ">
                                <h3><span>30% </span> Sale Off</h3>
                                <h2>Grand Opening Luvverys Bakery</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod <br> tempor
                                    incididunt ut labore et dolore magna</p>
                                <div class="timer__area">
                                    <div data-countdown="2023/10/11"></div>
                                </div>
                                <a class="btn btn-link" href="{{ route('shop') }}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner fullwidth section end -->
@endsection
