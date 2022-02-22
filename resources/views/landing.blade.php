@extends('layoutLanding')

@section('content')
<div class="row">
    <!-- Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Type</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Artices - {{ $articleCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <label for="cat" class="control-label col-sm-2">Category:</label>
            <div class="col-sm-10">
            <select class="form-control cat-landing" id="cat" name="category">
            <option value="0">All</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if(request()->id == $category->id) selected @endif)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<!-- Content Row -->
@foreach($articles as $article)
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $article->title }}</h6>
            </div>
            <div class="card-body">
                <div>Published by - {{ $randomArticle->name }}</div>
                <div>
                    Published at - {{ $randomArticle->created_at }}
                </div>
            </div>
            <div class="card-body">
                <img src="/article_images/{{ $article->image_path }}" style="display: block; max-width: 200px; width: 100%">
                {{ $article->details }}</div>
        </div>

    </div>
</div>
@endforeach
@endsection