@extends('layouts.app')
@section('title','Thanks')
@section('content')

@if (session('reservation'))
    <div class="alert alert-primary text-center">
        <style>
            table {
              border-collapse: collapse;
              width: 100%;
            }
            
            td, th {
              text-align: center;
              padding: 8px;
            }
            
            tr:nth-child(even) {
              background-color: #dddddd;
            }
            </style>
        
            <h2>Your suit has been reserved for you.</h2>
            <h3 style="padding: 7px">Here's the details of your order:</h3>
            
            <h1>Code: </h1><h1 style="padding: 7px;background:#c9c9c9;color: rgb(10, 175, 106)">{{session('reservation')->secret_code}}</h1>
            <table>
                <tr>
                    <td>Name: {{session('reservation')->name}}</td>
                </tr>
                <tr>
                    <td>Day: {{date('Y-m-d')}}</td>
                </tr>
                <tr>
                    <td>Duration: {{session('reservation')->duration}}</td>
                </tr>
                <tr>
                    <td>Phone: {{session('reservation')->phone}}</td>
                </tr> 
                <tr>
                    <td>Email: {{session('reservation')->email}}</td>
                </tr> 
                
            </table>
            <a href="{{route('home.main')}}">
                <button class="btn btn-primary">Back Home</button>
            </a>
            <a href="{{route('home.invoice',['secret_code'=>session('reservation')->secret_code])}}">
                <button class="btn btn-success">Download Invoice</button>
            </a>
            </body>
    </div>
@else
<div class="alert alert-primary text-center">
<a href="{{route('home.main')}}">
    <button class="btn btn-primary">Back Home</button>
</a>
</div>
@endif
@endsection