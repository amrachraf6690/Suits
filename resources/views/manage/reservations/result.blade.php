@extends('manage.layouts.app')
@section('title', 'Reservations')
@section('content')
<div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Check Reservation</h3>

        
        </div>
    </div>
  </div>
  @if($reservation)
  <div class="card bg-success m-2">
    <div class="card-header">
      <h3 class="card-title">We found it</h3>
    
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <h1>Code: {{$reservation->secret_code}}</h1>
        Day: {{$reservation->day}}<br>
        Duration: {{$reservation->duration}}<br>
        name: {{$reservation->name}}<br>
        Phone: {{$reservation->phone}}<br>
        Email: {{$reservation->email}}<br>
        <h2>Suit: </h2>
        Suit Title: {{$reservation->suit->title}}<br>
        Suit Color: {{$reservation->suit->color}}<br>
        Suit Price: {{$reservation->suit->price}}<br>
        @if($reservation->taken == 0)
                    <div class=" d-flex justify-content-center align-items-center">
                        <a class="btn btn-primary btn-sm">
                            <i class="fas fa-lock">
                            </i>
                            Not booked yet
                        </a><hr>
                        <a class="btn btn-warning" href="book/{{$reservation->secret_code}}">
                            <i class="fas fa-lock">
                            </i>
                            Book it
                        </a>
                    </div>
                    @else
                    <div class=" d-flex justify-content-center align-items-center">
                        <a class="btn btn-danger btn-sm">
                            <i class="fas fa-lock">
                            </i>
                            Booked before
                        </a><hr>
                        <a class="btn btn-primary" href="{{route('manage.home')}}">
                            <i class="fas fa-lock">
                            </i>
                            Go to home page
                        </a>
                    </div>
                    @endif
        
    </div>
    <!-- /.card-body -->
    </div>
  <!-- Other reservation details can be displayed here -->
  @else
  <div class="card bg-danger m-2">
    <div class="card-header">
      <h3 class="card-title">No reservation</h3>
    
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        No reservation found with the provided code.
    </div>
    <!-- /.card-body -->
    </div>
  @endif
@endsection
