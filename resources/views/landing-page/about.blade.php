@extends('landing-page.landing.main')
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="{{asset('assets/img/others/Breadcrumbs-bg_1920x503.png')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>About Us</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Home </a></li>
                            <li> // About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <!-- about description section start -->
    <div class="about_description_section mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6" style="text-align: right;">
                    <div class="about_desc wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <h2>Luvverys Bakery</h2>
                        <p>Where every creation is crafted with love and designed to bring happiness to your life. Our passion is baking, and we believe that each bite of our cakes and baked goods should be a moment of pure joy.
                            At Luvverys Bakery, we use only the finest ingredients to ensure the highest quality in all our products. Our team of skilled bakers is dedicated to creating delicious and beautiful treats that not only taste amazing but also warm your heart. From classic cakes to innovative pastries, we have something to delight everyone.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="text-center">
                        <img src="{{asset('assets/img/others/Banner3_luvverys(1).png')}}" class="rounded" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about_description_section mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="text-center">
                        <img src="{{asset('assets/img/others/Banner3_luvverys.png')}}" class="rounded" alt="...">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6" style="text-align: left;">
                    <div class="about_desc wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <p>We understand that special moments deserve special treats. Whether you're celebrating a birthday, an anniversary, or simply treating yourself, Luvverys Bakery is here to make those moments even sweeter. Every item in our bakery is made with meticulous care and a whole lot of love, aiming to bring smiles and create lasting memories.
                            <br>
                            With love, The Luvverys Bakery Team
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about description section end -->
@endsection
