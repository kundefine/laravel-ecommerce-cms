@extends('fontend.layout.master')


@section('content-section');

<section class="order-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="height: 500px"></div>
            </div>
        </div>
    </div>
</section>

{{-- photo galary --}}
@include('fontend.inc.photo-galary')

@endsection('content-section')