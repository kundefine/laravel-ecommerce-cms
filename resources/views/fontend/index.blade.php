@extends('fontend.layout.master')


@section('content-section');

<section class="home-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="widget-static-block">
                {{-- {!!$home['discription']!!} --}}

                    {{-- Top Banner --}}
                    <div class="top-banner">
                        <img src="{{asset('/fontend/assets/img/banner/01.jpg')}}" alt="">
                    </div>
                    


                    {{-- New Arrival --}}
                    <div class="container main-slider-content">
                        <div class="row top-sec-pro">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="module hot-categories ">
                                    <h1 class="modtitle">New Arrivals</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row product-slider">
                            <div class="owl-carousel owl-img owl-theme">
                                <div class="product-sec-main">
                                    <div class="product-top">
                                        <a href="#"> <img src={{asset( "fontend/assets/img/latest/gal_1.jpg ")}} alt=""></a>
                                    </div>
                                    <div class="product-bottom text-center">
                                        <h4>KONKA KE43MI311N (43" SMART LED)</h4>
                                        <h5>BDT 450.00</h5>
                                    </div>
                                </div>
                                <div class="product-sec-main">
                                    <div class="product-top">
                                        <a href="#"> <img src={{asset( "fontend/assets/img/latest/gal_2.jpg ")}} alt=""></a>
                                    </div>
                                    <div class="product-bottom text-center">
                                        <h4>KONKA KE43MI311N (43" SMART LED)</h4>
                                        <h5>BDT 450.00</h5>
                                    </div>
                                </div>
                                <div class="product-sec-main">
                                    <div class="product-top">
                                        <a href="#"> <img src={{asset( "fontend/assets/img/latest/gal_3.jpg ")}} alt=""></a>
                                    </div>
                                    <div class="product-bottom text-center">
                                        <h4>KONKA KE43MI311N (43" SMART LED)</h4>
                                        <h5>BDT 450.00</h5>
                                    </div>
                                </div>
                                <div class="product-sec-main">
                                    <div class="product-top">
                                        <a href="#"> <img src={{asset( "fontend/assets/img/latest/gal_4.jpg ")}} alt=""></a>
                                    </div>
                                    <div class="product-bottom text-center">
                                        <h4>KONKA KE43MI311N (43" SMART LED)</h4>
                                        <h5>BDT 450.00</h5>
                                    </div>
                                </div>
                                <div class="product-sec-main">
                                    <div class="product-top">
                                        <a href="#"> <img src={{asset( "fontend/assets/img/latest/gal_5.jpg ")}} alt=""></a>
                                    </div>
                                    <div class="product-bottom text-center">
                                        <h4>KONKA KE43MI311N (43" SMART LED)</h4>
                                        <h5>BDT 450.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- New Arrival 2 --}}
                    <div class="container main-slider-content">
                        <div class="row top-sec-pro">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="module hot-categories ">
                                    <h1 class="modtitle" style="display: block; text-align: right; margin-left: auto; width: 100%; margin-bottom: 0px;">
                                        Exclusive Collection
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="row product-slider">
                            <div class="owl-carousel owl-img owl-theme">
                                <div class="product-sec-main">
                                    <div class="product-top">
                                        <a href="#"> <img src={{asset( "fontend/assets/img/latest/gal_1.jpg ")}} alt=""></a>
                                    </div>
                                    <div class="product-bottom text-center">
                                        <h4>KONKA KE43MI311N (43" SMART LED)</h4>
                                        <h5>BDT 450.00</h5>
                                    </div>
                                </div>
                                <div class="product-sec-main">
                                    <div class="product-top">
                                        <a href="#"> <img src={{asset( "fontend/assets/img/latest/gal_2.jpg ")}} alt=""></a>
                                    </div>
                                    <div class="product-bottom text-center">
                                        <h4>KONKA KE43MI311N (43" SMART LED)</h4>
                                        <h5>BDT 450.00</h5>
                                    </div>
                                </div>
                                <div class="product-sec-main">
                                    <div class="product-top">
                                        <a href="#"> <img src={{asset( "fontend/assets/img/latest/gal_3.jpg ")}} alt=""></a>
                                    </div>
                                    <div class="product-bottom text-center">
                                        <h4>KONKA KE43MI311N (43" SMART LED)</h4>
                                        <h5>BDT 450.00</h5>
                                    </div>
                                </div>
                                <div class="product-sec-main">
                                    <div class="product-top">
                                        <a href="#"> <img src={{asset( "fontend/assets/img/latest/gal_4.jpg ")}} alt=""></a>
                                    </div>
                                    <div class="product-bottom text-center">
                                        <h4>KONKA KE43MI311N (43" SMART LED)</h4>
                                        <h5>BDT 450.00</h5>
                                    </div>
                                </div>
                                <div class="product-sec-main">
                                    <div class="product-top">
                                        <a href="#"> <img src={{asset( "fontend/assets/img/latest/gal_5.jpg ")}} alt=""></a>
                                    </div>
                                    <div class="product-bottom text-center">
                                        <h4>KONKA KE43MI311N (43" SMART LED)</h4>
                                        <h5>BDT 450.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     {{-- Bottom Banner --}}
                    <div class="bottom-banner">
                        <div class="row">
                            <div class="col-md-12 justify-content-center">
                                <img src={{asset('/fontend/assets/img/banner/02.jpg')}} alt="">
                                <img src={{asset('/fontend/assets/img/banner/03.jpg')}} alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- photo galary --}}
@include('fontend.inc.photo-galary')

@endsection('content-section')