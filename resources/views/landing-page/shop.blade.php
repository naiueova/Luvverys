@extends('landing-page.landing.main')
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-100"
        data-bgimg="{{ asset('assets/img/others/Breadcrumbs-bg-revisi.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>Products</h1>
                        <ul>
                            <li><a href="{{ route('index') }}">Home </a></li>
                            <li> // Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <!-- product page section start -->
    <div class="product_page_section mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="product_sidebar product_widget">
                        <div class="widget__list widget_filter wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                            <h3>Filter</h3>
                            <div class="widget_filter_list mb-30">
                                <h4>Filter By Category</h4>
                                <ul>
                                    <li><a href="{{ route('shop') }}"
                                            class="{{ $categorySelected == null ? 'active' : '' }}">All</a></li>
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('shop', $category->slug) }}"
                                                class="{{ $categorySelected == $category->id ? 'active' : '' }}">{{ $category->category_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="widget__list category wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            <h3>category</h3>
                            <div class="widget_category">
                                <ul>
                                    <li><a href="#">All <span>(65)</span></a></li>
                                    <li><a href="#">Cookies <span>(15)</span></a></li>
                                    <li><a href="#">Desserts <span>(10)</span></a></li>
                                    <li><a href="#">Muffins <span>(22)</span></a></li>
                                    <li><a href="#">Pizza <span>(15)</span></a></li>
                                    <li><a href="#">Doughnuts <span>(10)</span></a></li>
                                    <li><a href="#">Danish <span>(24)</span></a></li>
                                </ul>
                            </div>
                        </div> --}}
                        <div class="widget__list wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                            <div class="widget_banner">
                                <img src="assets/img/others/product-sidaber-banner.png" alt="">
                            </div>
                        </div>
                        <div class="widget__list tags wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.4s">
                            <h3>Tags</h3>
                            <div class="widget_tags">
                                <ul>
                                    <li><a href="#">Cookies</a></li>
                                    <li><a href="#">Doughnuts</a></li>
                                    <li><a href="#">Desserts</a></li>
                                    <li><a href="#">Muffins</a></li>
                                    <li><a href="#">Doughnuts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product_page_wrapper">
                        <!--shop toolbar area start-->
                        <div class="product_sidebar_header mb-60 d-flex justify-content-between align-items-center">
                            <div class="page__amount border">
                                <p><span>12</span> Product Found of <span>30</span></p>
                            </div>
                            <div class="product_header_right d-flex align-items-center">
                                <div class="sorting__by d-flex align-items-center">
                                    <span>Sort By : </span>
                                    {{-- <form class="select_option" action="#"> --}}
                                    <select name="sort" id="sort" onchange="applyFilter()">
                                        <option selected value="1">Default</option>
                                        <option value="low" {{ $sort == 'low' ? 'selected' : '' }}> low to high</option>
                                        <option value="high" {{ $sort == 'high' ? 'selected' : '' }}> high to low</option>
                                    </select>
                                    {{-- </form> --}}
                                </div>
                                <div class="product__toolbar__btn">
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item">
                                            <a class="active" data-bs-toggle="tab" href="#grid" role="tab"
                                                aria-controls="grid" aria-selected="true"><i class="ion-grid"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-bs-toggle="tab" href="#list" aria-controls="list" role="tab"
                                                aria-selected="false"><i class="ion-ios-list"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--shop toolbar area end-->


                        <!--shop gallery start-->
                        <div class="product_page_gallery">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="grid">
                                    <div class="row grid__product">
                                        @foreach ($products as $product)
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <article class="single_product wow fadeInUp" data-wow-delay="0.1s"
                                                    data-wow-duration="1.1s">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a href="{{ route('product.detail', $product->slug) }}"><img
                                                                    src="{{ asset('storage/' . $product->image1_url) }}"
                                                                    alt=""></a>
                                                            <div class="action_links">
                                                                <ul class="d-flex justify-content-center">
                                                                    <li class="add_to_cart"><a href="cart.html"
                                                                            title="Add to cart">
                                                                            <span class="pe-7s-shopbag"></span></a></li>
                                                                    <li class="wishlist"><a href="#"
                                                                            title="Add to Wishlist"><span
                                                                                class="pe-7s-like"></span></a></li>
                                                                    <li class="quick_button"><a href="#"
                                                                            title="Quick View" data-bs-toggle="modal"
                                                                            data-bs-target="#modal_box_{{ $product->id }}">
                                                                            <span class="pe-7s-look"></span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <figcaption class="product_content text-center">
                                                            <h4>
                                                                <a href="{{ route('product.detail', $product->slug) }}">{{ $product->product_name }}</a>
                                                            </h4>
                                                            <div class="price_box">
                                                                <span class="current_price">Rp
                                                                    {{ number_format($product->new_price, 0, ',', '.') }}</span>
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
                        <div class="pagination poduct_pagination">
                            {{ $products->links() }}
                        </div>
                        <!--shop gallery end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function applyFilter() {
            var url = '{{ url()->current() }}';
            var sortValue = document.getElementById('sort').value;
            if (sortValue !== '1') {
                url += '?sort=' + sortValue;
            }
            window.location.href = url;
        }
    </script>
    <!-- product page section end -->
@endsection
