@extends("adminlte::page")

@section("title", "Novo Post")

@section("content_header")
    <h1>New Project</h1>
@endsection

@section("content")

@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

<form role="form" method="post" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="10"></textarea>
      </div>
      <div class="form-group">
          <label for="content">Link</label>
          <input type="text" name="link" class="form-control">
      </div>
      <div class="form-group">
        <label for="files">Images</label>
        <input type="file" class="form-control" multiple name="files" id="files">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
@endsection