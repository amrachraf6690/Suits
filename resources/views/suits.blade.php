@extends('layouts.app')
@section('title', 'Suits')
@section('content')
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Suits</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                

                <div class="">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products p-3">
                                        <p><span>{{$count}}</span> suits found</p>
                                    </div>
                                    <!-- Sorting -->
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
@foreach($suits as $suit)
    

                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="{{Storage::url($suit->images[0]->image)}}" style="width: 400px;height: 450px;">
                                        <!-- Hover Thumb -->
                                        <img  src="{{Storage::url($suit->images[1]->image)}}" class="hover-img" style="width: 400px;height: 450px;">
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span>{{$suit->price}}</span> / Day
                                        <a href="../suit/{{$suit->slug}}">
                                            <h6>{{$suit->title}}</h6>
                                        </a>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="../suit/{{$suit->slug}}" class="btn essence-btn">View ME</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

@endforeach
                        </div>
                    </div>
                    <!-- Pagination -->
                        <ul class=" text-center">
                            {{ $suits->links('vendor.pagination.bootstrap-4') }}
                        </ul>

                </div>
            </div>
        </div>
    </section>
@endsection