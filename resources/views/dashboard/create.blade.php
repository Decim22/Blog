@extends('dashboard.layout.main')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <a href="/" class="btn btn-secondary mt-2">Go back</a>
  <h1 class="mt5 mb-3">Create post</h1>
  <form action="store" method="post" role="form" class="mb-5">
    @csrf
    <div class="form-group">
      <label>Title *</label>
      <input type="text" name="title" class="form-control" placeholder="Please enter post title">
    </div>
    <div class="form-group">
      <label>Content *</label>
      <textarea name="body" placeholder="Post body" class="form-control" rows="4"></textarea>
    </div>
      <label>Status *</label>
    <div class="form-group">
      <select name="status" class="form-control">
        <option value="draft">draft</option>
        <option value="pending">pending</option>
        <option value="published">published</option>
      </select>
    </div>
    <div class="form-group">
      @foreach($categories as $category)
      <input type="checkbox" name="category" value="{{$category->id}}">
         {{$category->name}}
      @endforeach
    </div>
    <div>
      <input type="submit" class="btn btn-success btn-send" value="Create post">
    </div>
  </form>
</main>
@endsection