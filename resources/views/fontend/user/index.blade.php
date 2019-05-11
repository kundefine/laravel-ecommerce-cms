@extends('fontend.layout.master')

@section('content-section')

<section class="fontend-user-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-info">Shipping Address</h4>
                <hr>
                @include('fontend.inc.user-shipping-address')
            </div>

            <div class="col-md-6">
                <h4 class="text-info">Find Your Order</h4>
                <hr>
                <div class="form-group">
                    <label for="">Your Invoice Id</label>
                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>

                </div>
            </div>
        </div>
    </div>
</section>




@endsection('content-section')