@extends('layout')

@section('content')
<div class="row">
   
<div class="container">
  <h2>User (Journalist) Edit form</h2>
  <form class="form-horizontal" method="post">
    @csrf
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $userEdit->name }}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ $userEdit->email }}">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif
        @if(Session::has('status'))
          <div class="alert alert-success">
            {{ request()->session()->get('status') }}
          </div>
        @endif

        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>
@endsection