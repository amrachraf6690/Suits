@extends('layouts.app')
@section('title', $suit->title)
@section('content')
 <!-- ##### Checkout Area Start ##### -->
 <div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading mb-30">
                        <h5>Billing Address</h5>
                    </div>

                    <form action="{{route('home.reservation')}}" method="post">
                        @csrf
                        <input type="hidden" name="suit_id" value="{{$suit->id}}">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="name"> Name <span>*</span></label>
                                <input name="name" type="text" class="form-control" id="name" value="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="duration">Duration <span>*</span></label>
                                <input  name="duration" type="number" class="form-control" id="duration" value="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="phone_number">Phone <span>*</span></label>
                                <input  name="phone" type="number" class="form-control" id="phone_number" min="0" value="" required>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Email Address <span>*</span></label>
                                <input  name="email" type="email" class="form-control" id="email_address" value="" required>
                            </div>

                            <div class="col-12">
                                <button  class="btn essence-btn" type="submit">Reserve it</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- ##### Checkout Area End ##### -->
@endsection