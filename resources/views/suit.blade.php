@extends('layouts.app')
@section('title', $suit->title)
@section('content')
<section class="single_product_details_area d-flex align-items-center" style="padding-top: 20px;padding-left:100px">

    <!-- Single Product Thumb -->
    <div class="single_product_thumb clearfix">
        <div class="product_thumbnail_slides owl-carousel">
            <img src="{{Storage::url($suit->images[0]->image)}}" alt="" style="width: 650px;height: 450px">
            <img src="{{Storage::url($suit->images[1]->image)}}" alt="" style="width: 550px;height: 450px">
            <img src="{{Storage::url($suit->images[2]->image)}}" alt="" style="width: 550px;height: 450px">
        </div>
    </div>

    <!-- Single Product Description -->
    <div class="single_product_desc clearfix">
        <span>Color: {{$suit->color}}</span>
        <a href="#">
            <h2>{{$suit->title}}</h2>
        </a>
        <p class="product-price">{{$suit->price}}LE / Day</p>
        <p class="product-desc">{{$suit->discription}}.</p>
        <a href="{{route('home.reserve',['slug'=>$suit->slug])}}">
        <button type="submit" name="addtocart" value="5" class="btn essence-btn">Rent Now</button></a>
    </div>
</section>
<!-- ##### Single Product Details Area End ##### -->

@endsection