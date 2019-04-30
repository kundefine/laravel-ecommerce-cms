@extends('fontend.layout.master')
@section('css')
<style>
.single-product {
    border: 1px solid #1e87f0;
    display: inline-block;
    padding: 8px;
    box-sizing: border-box;
    text-align: center;
}

.thumbnail {
    width: 100%;
    height: 250px;
    overflow: hidden;
    border: 1px solid #00a4ff;
    display: flex;
    justify-content: center;
    align-items: center;
}

.thumbnail img {
    width: 100%;
    height: 100%;
}

h4.product-name {
    margin: 4px 0;
}

h3.price {
    margin: 0px 0;
}

h3.price del, h3.price ins {
    font-size: 20px;
}
</style>
@endsection


@section('content-section');

<section class="order-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">You Search Result For <span class="text-primary">'{{$_GET['q']}}'</span></h4>
                <hr>

                <div class="singleProduct">
                    <div class="row">
                    @foreach($all_products as $product)
                        
                            <div class="col-md-4">
                                <div class="single-product">
                                    <div class="thumbnail">
                                        @if(trim($product->product_thumbnail, "\"") === 'nothumbnail.jpg')
                                            <a href="/product/{{$product->id}}"><img src="https://via.placeholder.com/468x480?text=No+Image+Found"></a>
                                        @else
                                            <a href="/product/{{$product->id}}"><img src="/product_images/product_{{$product->id}}/{{trim($product->product_thumbnail, "\"")}}"></a>
                                        @endif
                                    </div>
                                    
                                    <h4 class="product-name"><a href="/product/{{$product->id}}">{{$product->product_title}}</a></h4>
                                    <h3 class="price">
                                        @if($product->product_price !== $product->product_price_after_discount)
                                        <del>BDT {{$product->product_price}}</del> 
                                        @endif
                                        <ins>BDT {{$product->product_price_after_discount}}</ins>
                                    </h3>
                                </div>
                            </div>
                        
                        
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- photo galary --}}
@include('fontend.inc.photo-galary')

@endsection('content-section')