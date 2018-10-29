@extends('dashboard.layout.main')
@section('content')
	<h1>Posts	<a href="admin/create" class="btn btn-primary">Add new post</a></h1>
	@if(count($posts) > 0)
	@foreach($posts as $post)
		<div class="card">
			<div class="card-body">
				<h3>
					<a href="posts/{{ $post->id }}">{{ $post->title }}</a>
					<a href="/posts/{{$post->id}}/edit" class="btn btn-success float-right">Edit</a>
					<form action="postss/{{$post->id}}" method="post" class="float-right">
						@csrf
						{{method_field('delete')}}
						<input type="submit" name="delete" value="Delete" class="btn btn-danger">
					</form>
				</h3>
			</div>
		</div>
		@endforeach
		@endif
@endsection