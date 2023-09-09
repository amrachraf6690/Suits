@extends('manage.layouts.app')
@section('title', 'Home Page')
@section('content')
@if(Session::get('message'))
<div class="card bg-success">
  <div class="card-header">
    <h3 class="card-title">{{Session::get('message')}}</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
      </button>
    </div>
  </div>
</div>
@endif
<div class="row">
  <div class="col-lg-12 col-24">
    <div class="card">
      <div class="card-header border-0">
        <h3 class="card-title">Overview</h3>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
          <p class="text-success text-xl">
            <i class="ion ion-ios-refresh-empty"></i>
          </p>
          <p class="d-flex flex-column text-right">
            <span class="font-weight-bold">
              <i class="ion ion-android-arrow-up text-success"></i> {{$count['suits']}}
            </span>
            <span class="text-muted">SUITS</span>
          </p>
        </div>
        <!-- /.d-flex -->
        <div class="d-flex justify-content-between align-items-center mb-0">
          <p class="text-warning text-xl">
            <i class="ion ion-ios-cart-outline"></i>
          </p>
          <p class="d-flex flex-column text-right">
            <span class="font-weight-bold">
              <ion-icon name="ticket-outline"></ion-icon>{{$count['reservations']}}
              (<ion-icon name="happy-outline"class="text-success"></ion-icon>{{$count['booked_reservations']}}
              /<ion-icon name="sad-outline" class="text-danger"></ion-icon>{{$count['unbooked_reservations']}})
            </span>
            <span class="text-muted">RESERVATIONS</span>
          </p>
        </div>
        <!-- /.d-flex -->
      </div>
    </div>

</div>
<div class="col-lg-12 col-24">
  <div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Let's do some majic</h3>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center border-bottom mb-1">
        <a href="{{route('manage.suit.add')}}">Add Suit</a>
        <a href="{{route('manage.suits')}}">Edit Suit</a>
        <a href="{{route('manage.reservation.check')}}">Check Reservations</a>
        <a href="tel:+201063153994">Call Developer</a>
      </div>
    </div>
  </div>
</div>
@endsection