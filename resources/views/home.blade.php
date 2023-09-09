@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

@if($latest->count()>0)
    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url({{Storage::url($latest[0]->images[0]->image)}});background-size: 100%">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h2>{{$latest[0]->title}}</h2>
                        <a href="{{route('home.reserve',['slug'=>$latest[0]->slug])}}" class="btn essence-btn">Take it</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->
    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Latest Products</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
@foreach($latest as $suit)
    

                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{Storage::url($suit->images[0]->image)}}" alt="" style="width: 1000px;height:300px">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{Storage::url($suit->images[1]->image)}}" alt="" style="width: 1000px;height:300px">
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>{{$suit->price}} LE</span>
                                <a href="suit/{{$suit->slug}}">
                                    <h6>{{$suit->title}}</h6>
                                </a>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="suit/{{$suit->slug}}" class="btn essence-btn">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
@endforeach
                    </div>
                    <div class="text-center">
                        <div class="col-12">
                                <a href="suits" class="btn essence-btn">View all suits</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->
@else
<section class="welcome_area bg-img background-overlay">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content">
                    <h2>No suits yet</h2>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection