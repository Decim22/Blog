@extends ('blog.partial.post')

@section ('content')
<div class="col-md-8 blog-main">
  <h3 class="pb-3 mb-4 font-italic border-bottom">
    From the Firehose
  </h3>

@include('blog.post')
  <hr>
  <div>
    <div class="card-block" id="commentForm">
      <form action="/posts/{{$post->id}}/comments" method="POST">
        @csrf
        <div class="form-group">
          <textarea id="body" class="form-control" placeholder="Your comment here.." name="comment"></textarea>
        </div>
        <div class="form-group text-center">
          <button class="btn btn-outline-primary">Add comment</button>
        </div>
      </form>
    </div>
  </div>
  <hr>
  @if(count($post->comments))
  <ul class="list-group">
    @foreach($post->comments as $comment)
    <li class="list-group-item">
      <b>{{$comment->created_at->diffForHumans()}}:</b> {{$comment->comment}}
    </li>
    @endforeach
  </ul>
  @else
  <h1>No Comments</h1>
  @endif
</div><!-- /.blog-main -->
@endsection