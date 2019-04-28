@extends('fontend.layout.master')


@section('content-section');

<section class="home-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="widget-static-block">
                    <h2 class="page-title">{{$page->title}}</h2>
                    <div class="page-content">
                        {!!$page->discription!!}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

{{-- photo galary --}}
@include('fontend.inc.photo-galary')

@endsection('content-section')