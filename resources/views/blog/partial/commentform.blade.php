  <hr>
  <div>
    <h3>New Comment</h3>
    <div class="card-block" id="commentForm">
      <form action="/posts/{{$post->id}}/comments" method="POST">
        @csrf
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Input your email here ..">
        </div>
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