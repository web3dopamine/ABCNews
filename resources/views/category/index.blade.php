@extends('layout')

@section('content')
<div class="container">
  <h2>Category List</h2>          
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Name</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <td>{{ $category->name }}</td>
        <td>{{ $category->created_at }}</td>
        <td>{{ $category->updated_at }}</td>
        <td><a href="/category/edit/{{ $category->id }}"><button type="button" class="btn btn-warning">Edit</button></a>&nbsp;&nbsp;<button type="submit" class="btn btn-danger cat-del-btn" data-id="{{ $category->id }}" data-toggle="modal" data-target="#delModal">Delete</button></td>
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
            <button type="button" class="btn btn-danger cat-yes-del">Yes</button>&nbsp;&nbsp;<button data-dismiss="modal" type="button" class="btn btn-success">No</button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
  </div>
</div>

@endsection