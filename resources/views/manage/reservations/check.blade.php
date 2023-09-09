@extends('manage.layouts.app')
@section('title', 'Reservations')
@section('content')
@if($errors->any())
@foreach($errors->all() as $error)
<div class="card bg-danger m-2" style="height: 105px !important">
<div class="card-header">
  <h3 class="card-title">Error</h3>

  <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
    </button>
  </div>
  <!-- /.card-tools -->
</div>
<!-- /.card-header -->
<div class="card-body">
  {{$error}}
</div>
<!-- /.card-body -->
</div>
@endforeach
@endif
<div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Check Reservation</h3>

        
        </div>
    </div>
  </div>
  <form method="POST" action="{{route('manage.reservation.validate')}}">
    @csrf
    <div class="card-body">
      <div class="form-group text-center">
        <label for="exampleInputEmail1">Title</label>
        <input name="secret_code" class="form-control text-center" id="exampleInputEmail1" placeholder="Enter Secret Code" value="{{old('secret_code')}}">
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer  d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">Check Reservation</button>
    </div>
  </form>
@endsection