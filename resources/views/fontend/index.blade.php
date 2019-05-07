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
                        <?php 
                            $home_data = json_decode($home['discription'], true);

                            if(!empty($home_data)) {
                                $top_banner = $home_data['top_banner'];
                            }
                        ?>
                        @if(!empty($home_data))
                            <a href="{{$top_banner['link']}}">
                                <img src="/{{$top_banner['path']}}" alt=""> 
                            </a>
                            
                        @endif
                        
                    </div>
                    
                    <?php 
                        $products = config('global.all_product');
                        $newArrivals = (new $products)
                                        ->where([
                                            ['cat_id', '=', 21],
                                            ['visibility', '=', 1],
                                        ])
                                        ->get()
                                        ->take(10);
                        
                        
                    ?>

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
                                @foreach ( $newArrivals as $newArrival  )
                                    <div class="product-sec-main">
                                        <div class="product-top">
                          
                                            @if(trim($newArrival->product_thumbnail, "\"") === 'nothumbnail.jpg')
                                                <a href="/product/{{$newArrival->id}}"><img src="https://via.placeholder.com/468x480?text=No+Image+Found"></a>
                                            @else
                                                <a href="/product/{{$newArrival->id}}"><img src="/product_images/product_{{$newArrival->id}}/{{trim($newArrival->product_thumbnail, "\"")}}"></a>
                                            @endif
                                  
                                        </div>
                                        <div class="product-bottom text-center">
                                            <h4>{{$newArrival->product_title}}</h4>
                                            <h5><del>BDT{{$newArrival->product_price}}</del><ins> BDT{{$newArrival->product_price_after_discount}}</h5>
                                        </div>
                                    </div>
                               @endforeach
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
                            <div class="owl-carousel owl-img2 owl-theme">
                                <?php 
                                    $products = config('global.all_product');
                                    $Exclusives = (new $products)
                                                    ->where([
                                                        ['cat_id', '=', 22],
                                                        ['visibility', '=', 1],
                                                    ])
                                                    ->get()
                                                    ->take(10);
                                    
                                    
                                ?>

                                @foreach ( $Exclusives as $Exclusive  )
                                    <div class="product-sec-main">
                                        <div class="product-top">
                          
                                            @if(trim($Exclusive->product_thumbnail, "\"") === 'nothumbnail.jpg')
                                                <a href="/product/{{$Exclusive->id}}"><img src="https://via.placeholder.com/468x480?text=No+Image+Found"></a>
                                            @else
                                                <a href="/product/{{$Exclusive->id}}"><img src="/product_images/product_{{$Exclusive->id}}/{{trim($Exclusive->product_thumbnail, "\"")}}"></a>
                                            @endif
                                  
                                        </div>
                                        <div class="product-bottom text-center">
                                            <h4>{{$Exclusive->product_title}}</h4>
                                            <h5><del>BDT{{$Exclusive->product_price}}</del><ins> BDT{{$Exclusive->product_price_after_discount}}</h5>
                                        </div>
                                    </div>
                               @endforeach
                                
                            </div>
                        </div>
                    </div>

                     {{-- Bottom Banner --}}
                    <div class="bottom-banner">
                        <div class="row">
                            <div class="col-md-12 justify-content-center">
                                    @if(count($bottomHomeBanner))
                                    @foreach ($bottomHomeBanner as $homeBottomBannerSingle)
                                        <a href="{{$homeBottomBannerSingle->banner_url}}" target="_blank">
                                            <img src="{{$homeBottomBannerSingle->banner_img}}" alt="">
                                        </a>
                                    @endforeach
                                        
                                    @endif

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