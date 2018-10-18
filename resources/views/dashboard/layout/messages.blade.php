@if($errors->any())
  @foreach($errors->all() as $error)
  <div class="alert alert-danger mt-2">
    {{$error}}
  </div>
  @endforeach
@endif
@if(session('success')) 
<div class="alert alert-success mt-2">
	{{session('success')}}
</div>
@endif