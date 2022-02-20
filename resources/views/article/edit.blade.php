@extends('layout')

@section('content')
<div class="row">
   
<div class="container">
  <h2>Article Edit form</h2>
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    @csrf
      <br><br>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="category" placeholder="Enter Article title" name="title" value="{{ $article->title }}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="image">Details:</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="details" placeholder="Write your article..." name="details">{{ $article->details }}</textarea>
      </div>
    </div>
    <div class="form-group">
    <label for="cat" class="control-label col-sm-2">Category:</label>
    <div class="col-sm-10">
    <select class="form-control" id="cat" name="category">
      @foreach($categories as $category)
        <option value="{{ $category->id }}"
          @if ($article->category_id == $category->id) selected @endif
          >{{ $category->name }}</option>
        @endforeach
    </select>
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