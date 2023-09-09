@extends('manage.layouts.app')
@section('title', 'Edit "'.$suit->title.'"')
@section('content')
    <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit | {{$suit->title}}</h3>
    
            
            </div>
        </div>
      </div>
      <form method="POST" action="{{route('manage.suit.update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$suit->id}}">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Suit Title" value="{{$suit->title}}">
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="discription" class="form-control" rows="3" placeholder="Enter ...">{{$suit->discription}}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input name="price" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Suit Price"  value="{{$suit->price}}">
          </div>
          <div class="form-group">
            <label>Color</label>
            <select name="color" class="form-control">
              <option>Black</option>
              <option>White</option>
              <option>Gray</option>
              <option>Rose</option>
              <option>Dark Blue</option>
            </select>
          </div>
        </div>
        <!-- /.card-body -->
    
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Edit {{$suit->title}}</button>
        </div>
      </form>
    
@endsection