@extends('layout')

@section('content')
<div class="container">
  <h2>Users List</h2>          
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($list as $item)
      <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->created_at }}</td>
        <td>{{ $item->updated_at }}</td>
        <td><a href="/user/edit/{{ $item->id }}"><button type="button" class="btn btn-warning">Edit</button></a>&nbsp;&nbsp;
          @if($item->id != Auth::id())
          <button type="submit" class="btn btn-danger user-del-btn" data-id="{{ $item->id }}" data-toggle="modal" data-target="#delModal">Delete</button>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

<div id="delModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        
        <div class="modal-body">
            <p>Are you sure you want to delete?</p>
            <button type="button" class="btn btn-danger user-yes-del">Yes</button>&nbsp;&nbsp;<button data-dismiss="modal" type="button" class="btn btn-success">No</button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
  </div>
</div>

@endsection