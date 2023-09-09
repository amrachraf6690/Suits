@extends('manage.layouts.app')
@section('title', 'Add Suit')
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
        <h3 class="card-title">Add Suit</h3>

        
        </div>
    </div>
  </div>
  <form method="POST" action="{{route('manage.suit.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Suit Title" value="{{old('title')}}">
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea name="discription" class="form-control" rows="3" placeholder="Enter ...">{{old('discription')}}</textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input name="price" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Suit Price"  value="{{old('price')}}">
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
      <div class="form-group">
        <label for="exampleInputFile">Image 1</label>
        <div class="input-group">
          <div class="custom-file">
            <input name="image1" type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Upload</span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Image 2</label>
        <div class="input-group">
          <div class="custom-file">
            <input  name="image2"  type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Upload</span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Image 3</label>
        <div class="input-group">
          <div class="custom-file">
            <input  name="image3" type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Upload</span>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Add Suit</button>
    </div>
  </form>
@endsection