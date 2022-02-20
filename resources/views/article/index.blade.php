@extends('layout')

@section('content')
<div class="container">
  <h2>Article List</h2>
  <br><br>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Headline</th>
        <th>Published by</th>
        <th>Published at</th>
        <th>Updated at</th>
        <th>Category</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
      <tr>
        <td>{{ $article->title }}</td>
        <td>{{ $article->name }}</td>
        <td>{{ $article->created_at }}</td>
        <td>{{ $article->updated_at }}</td>
        <th>{{ $article->category_name }}</th>
        <td>
            <a href="#" class="btn btn-primary" data-id="{{ $article->id }}" data-target="#articleViewModal{{ $article->id }}" data-toggle="modal">View</a>
            <div id="articleViewModal{{ $article->id }}" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                    
                    <div class="modal-body">
                        <p>{{ $article->title }}</p>
                        <img src="/article_images/{{ $article->image_path }}" style="display: block; max-width: 200px; width: 100%">
                        <p>{{ $article->details }}</p>
                        <div>
                                    <div>Published by - {{ $article->name }}</div>
                                    <div>
                                        Published at - {{ $article->created_at }}
                                    </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="/article/edit/{{ $article->id }}" class="btn btn-primary">Edit</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>

                </div>
            </div>

        </td>
        <td><button type="button" class="btn btn-danger article-del-btn" data-toggle="modal" data-target="#articleModal" data-id="{{ $article->id }}">Delete</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>


<div id="articleModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        
        <div class="modal-body">
            <p>Are you sure you want to delete?</p>
            <button type="button" class="btn btn-danger article-yes-del">Yes</button>&nbsp;&nbsp;<button data-dismiss="modal" type="button" class="btn btn-success">No</button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
  </div>
</div>


@endsection