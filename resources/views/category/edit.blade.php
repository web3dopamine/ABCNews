@extends('layout')

@section('content')
<div class="row">
   
<div class="container">
  <h2>Category Edit form</h2>
  <form class="form-horizontal" method="post">
    @csrf
      <br><br>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Category Name:</label>
      <div class="col-sm-10">
        <input value="{{ $category->name }}" type="text" class="form-control" id="category" placeholder="Enter Category name" name="category">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        @if(Session::has('status'))
          <div class="alert alert-success">
            {{ request()->session()->get('status') }}
          </div>
        @endif

        <button type="submit" class="btn btn-success">Update</button>
      </div>
    </div>
  </form>
</div>
</div>
@endsection