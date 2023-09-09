@extends('manage.layouts.app')
@section('title', 'Reservations')
@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                    <th style="width: 20%">
                        Name
                    </th>
                    <th style="width: 20%">
                        Phone
                    </th>
                    <th style="width: 20%">
                        Code
                    </th>
                    <th style="width: 20%">
                        Day
                    </th>
                        <th style="width: 28%">
                        Is Booked
                    </th>
              </tr>
          </thead>
          <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>
                    <a>
                       {{$reservation->name}}
                    </a>
                    <br>
                </td>
                <td>
                    <a href="tel:+2{{$reservation->phone}}">
                        {{$reservation->phone}}
                    </a>
                    <br>
                </td>
                <td>
                    <a>
                        {{$reservation->secret_code}}
                    </a>
                    <br>
                </td>
                <td>
                    <a>
                        {{$reservation->day}}
                    </a>
                    <br>
                </td>
                <td>
                    @if($reservation->taken == 0)
                        <a class="btn btn-danger btn-sm">
                            <i class="fas fa-lock">
                            </i>
                            Not booked yet
                        </a>
                        <a class="m-1" href="{{route('manage.reservation.book',['secret_code'=>$reservation->secret_code])}}">Book Now</a>
                    @else
                        <a class="btn btn-success btn-sm">
                            <i class="fas fa-lock">
                            </i>
                            Booked Before
                        </a>
                    @endif
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>            
    {{ $reservations->links('vendor.pagination.bootstrap-4') }}
@endsection