@extends('landing-page.landing.main')
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-100" data-bgimg="{{ asset('assets/img/others/breadcrumbs-bg.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>Single Product</h1>
                        <ul>
                            <li><a href="{{ route('home') }}">Home </a></li>
                            <li> // Default Style</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <!-- single product section start-->
    <div class="single_product_section mb-100">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! session('success') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                @foreach ($productDetails as $productDetail)
                    <div class="col-lg-6 col-md-6">
                        <div class="single_product_gallery">
                            <div class="product_gallery_inner d-flex">
                                <div class="product_gallery_main_img">
                                    <div class="gallery_img_list">
                                        <img data-image="{{ asset('storage/' . $productDetail->image1_url) }}"
                                            src="{{ asset('storage/' . $productDetail->image1_url) }}" alt="">
                                    </div>
                                    <div class="gallery_img_list">
                                        <img src="{{ asset('storage/' . $productDetail->image2_url) }}" alt="">
                                    </div>
                                    <div class="gallery_img_list">
                                        <img src="{{ asset('storage/' . $productDetail->image3_url) }}" alt="">
                                    </div>
                                    <div class="gallery_img_list">
                                        <img src="{{ asset('storage/' . $productDetail->image4_url) }}" alt="">
                                    </div>
                                    <div class="gallery_img_list">
                                        <img src="{{ asset('storage/' . $productDetail->image5_url) }}" alt="">
                                    </div>
                                </div>
                                <div class="product_gallery_btn_img">
                                    <a class="gallery_btn_img_list" href="javascript:void(0)"><img
                                            src="{{ asset('storage/' . $productDetail->image1_url) }}" alt="tab-thumb"></a>
                                    <a class="gallery_btn_img_list" href="javascript:void(0)"><img
                                            src="{{ asset('storage/' . $productDetail->image2_url) }}" alt="tab-thumb"></a>
                                    <a class="gallery_btn_img_list" href="javascript:void(0)"><img
                                            src="{{ asset('storage/' . $productDetail->image3_url) }}" alt="tab-thumb"></a>
                                    <a class="gallery_btn_img_list" href="javascript:void(0)"><img
                                            src="{{ asset('storage/' . $productDetail->image4_url) }}" alt="tab-thumb"></a>
                                    <a class="gallery_btn_img_list" href="javascript:void(0)"><img
                                            src="{{ asset('storage/' . $productDetail->image5_url) }}" alt="tab-thumb"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product_details_sidebar">
                            <h2 class="product__title">{{ $productDetail->product_name }}</h2>
                            <div class="price_box">
                                <span class="new_price">Rp {{ number_format($productDetail->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="quickview__info mb-0">
                                <p class="product_review d-flex align-items-center">
                                    <span class="review_icon d-flex">
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                    </span>
                                    <span class="review__text"> (5 reviews)</span>
                                </p>
                            </div>
                            <p class="product_details_desc">{{ $productDetail->description }}</p>
                            </p>
                            <div class="product_pro_button quantity d-flex align-items-center">
                                <div class="pro-qty border">
                                    <input type="text" value="1">
                                </div>
                                <form action="{{ route('addCart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $productDetail->id }}">
                                    <button class="add_to_cart " type="submit">add to cart</button>
                                </form>
                                {{-- <a class="add_to_cart" type="submit">add to cart</a> --}}
                                <a class="wishlist__btn" href="#"><i class="pe-7s-like"></i></a>
                            </div>
                            <div class="product_paypal">
                                <img src="{{ asset('assets/img/others/paypal.webp') }}" style="width: 30%" alt="payments">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- product details section end-->

    <!-- product tab section start -->
    <div class="product_tab_section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_tab_navigation">
                        <ul class="nav justify-content-center">
                            <li>
                                <a class="active" data-bs-toggle="tab" href="#description"
                                    aria-controls="description">Description</a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#reviews" aria-controls="reviews">Reviews 03</a>
                            </li>
                        </ul>
                    </div>
                    <div class="product_page_content_inner tab-content">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="product_tab_desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                    officia
                                    deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus
                                    error
                                    sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                                    quae
                                    ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                    explicabo.
                                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                                    quia
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                    porro
                                    quisquam est, qui dolorem ipsum</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews__wrapper">
                                <h2>Write Your Own Review</h2>
                                <div class="customer__reviews d-flex justify-content-between mb-20">
                                    <div class="customer_reviews_left">
                                        <div class="comment__title">
                                            <h2>Add a review </h2>
                                            <p>Your email address will not be published. Required fields are marked
                                            </p>
                                        </div>
                                        <div class="reviews__ratting">
                                            <h3>Your rating</h3>
                                            <ul class="d-flex">
                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="customer_reviews_right">
                                        <h2 class="reviews__title">Customer Reviews</h2>
                                        <div class="reviews__ratting">
                                            <ul class="d-flex">
                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="reviews__desc">
                                            <h3>Lorem ipsum dolor sit amet</h3>
                                            <span>Deate on July 22, 2020</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                                ea
                                                commodo consequat.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="product_review_form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Your review </label>
                                                <textarea class="border" name="comment" id="review_comment"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">Name</label>
                                                <input class="border" id="author" type="text">

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">Email </label>
                                                <input class="border" id="email" type="text">
                                            </div>
                                        </div>
                                        <button class="btn custom-btn text-white" data-hover="Submit"
                                            type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product tab section end -->
@endsection
