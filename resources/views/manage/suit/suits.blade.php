@extends('manage.layouts.app')
@section('title', 'Suits')
@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 20%">
                      Title
                  </th>
                  <th style="width: 30%">
                      Images
                  </th>
                  <th style="width: 28%">
                      Actions
                  </th>
              </tr>
          </thead>
          <tbody>
            @foreach($suits as $suit)
            <tr>
                <td>
                    <a>
                        {{$suit->title}}
                    </a>
                    <br>
                </td>
                <td>
                    <ul class="list-inline">
                        @foreach($suit->images as $image)
                        <li class="list-inline-item">
                            <img alt="Image" class="table-avatar" src="{{Storage::url($image->image)}}">
                        </li>
                        @endforeach
                    </ul>
                </td>
                <td class="project-actions text-right">
                    <form action="{{route('manage.suit.delete')}}" method="post">
                        <a class="btn btn-info btn-sm" href="suit/edit/{{$suit->slug}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        @csrf
                        <input type="hidden" name="id" value="{{$suit->id}}">
                        <input type="hidden" name="title" value="{{$suit->title}}">
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> 
                            Delete
                        </button>
                </form>
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>            
    {{ $suits->links('vendor.pagination.bootstrap-4') }}
@endsection