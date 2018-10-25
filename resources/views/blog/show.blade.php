@extends ('blog.partial.post')

@section ('content')
<div class="col-md-8 blog-main">
  <h3 class="pb-3 mb-4 font-italic border-bottom">
    From the Firehose
  </h3>

@include('blog.post')
@include('blog.partial.commentform')

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