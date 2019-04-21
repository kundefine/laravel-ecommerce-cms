@extends('fontend.layout.master')


@section('content-section');

<section class="home-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="widget-static-block">
                    <div class="single-image">
                        <img src={{asset("fontend/assets/img/Join-the-adventure.jpg")}} alt="" class="img-fluid">
                    </div>
                    <div class="single-image">
                        <img src={{asset("fontend/assets/img/NEW-SALE-DESIGN.jpg")}} alt="" class="img-fluid">
                    </div>
                    <div class="single-image">
                        <img src={{asset("fontend/assets/img/New_Arrivals_Shop_Now.jpg")}} alt="" class="img-fluid">
                    </div>
                    <div class="single-image">
                        <img src={{asset("fontend/assets/img/Boys_tees_Shop_Now.jpg")}} alt="" class="img-fluid">
                    </div>
                    <div class="single-image">
                        <img src={{asset("fontend/assets/img/Girls_Jackets_Shop_Now.jpg")}} alt="" class="img-fluid">
                    </div>
                    <div class="single-image">
                        <img src={{asset("fontend/assets/img/Girls_Sets_Shop_Now.jpg")}} alt="" class="img-fluid double-img">
                        <img src={{asset("fontend/assets/img/Boys_Rompers_Shop_Now.jpg")}} alt="" class="img-fluid double-img">
                    </div>
                    <div class="single-image">
                        <img src={{asset("fontend/assets/img/Toys_Shop_Now.jpg")}} alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- photo galary --}}
@include('fontend.inc.photo-galary')

@endsection('content-section')