@extends("adminlte::page")

@section("title", $post->title)

@section("content_header")
    <h1>Edit Post</h1>
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

@if(session('status'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{session('status')}}
  </div>
@endif

<form role="form" method="post">
    @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
      </div>
      <div class="form-group">
        <label for="subtitle">Subtitle</label>
        <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{$post->subtitle}}">
      </div>
      <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control bodyfield" name="content" id="content">
            {{$post->content}}
          </textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputFile"></label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="cover" id="cover">
            <label class="custom-file-label" for="cover">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text" id="">Cover</span>
          </div>
        </div>
      </div>
      <div class="form-group">
          <label for="tags">Tags <small>Separe as tags por vírgulas</small></label>
          <input class="form-control" type="text" name="tags" id="tags">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
@endsection


@section("js")
    <script src="https://cdn.tiny.cloud/1/tcq1f8u4bv1sd4nmbgb5luvvs7mdhtizave87fbz8dc3xjcy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: ".bodyfield",
            height:"480",
            menubar:false,
            plugins: ['link', 'table','image', 'autoresize','lists'],
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
            images_upload_url:"{{route('image_upload')}}",
            images_upload_credentials:true,
            convert_urls:false
        });
    </script>
@endsection
