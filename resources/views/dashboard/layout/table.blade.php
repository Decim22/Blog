  <div>
    @foreach($posts as $post)
    <div class="card">
      <div class="card-body">
        <h6 class="font-weight-bold">{{$post->title}}</h6>
        <p>{{$post->category->name}}</p>
        <span>{{$post->status}}</span>
        <p class="float-right">{{$post->created_at}}</p>
      </div>
    </div>
    @endforeach
  </div>
    <nav class="blog-pagination mt-2">
      {{$posts->links()}}
    </nav>