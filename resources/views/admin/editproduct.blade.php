
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="/public">
    @include('admin.admincss');


  </head>
  <body>
    <div class="container-scroller">
      @include("admin.navbar");


      <div class="form"  >
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" items-dismiss="alert">x</button>
        {{session()->get('message')}}
        </div>
        @endif
    <form action="{{url('/update_article',$data->id)}}" method="POST" enctype="multipart/form-data" class="bg-dark text-light"  style="width:1300px; height:500px; margin-left:40px;  align-items:center;">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ $data->title }}" required="">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="5" value="{{ $data->content }}" required="">{{ $data->content }}</textarea>

        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category" id="category">
                @foreach($categories as $category)
                    <option value="{{ $data->category }}" required="">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <select class="form-control" name="author" id="author">
              @foreach($authors as $author)
                  <option value="{{ $data->author }}" required="">{{ $author->name }}</option>
              @endforeach
          </select>
      </div>
      <div class="form-group">
        <label for="editor">editor</label>
        <select class="form-control" name="editor" id="editor">
            @foreach($editors as $editor)
                <option value="{{ $data->editor }}" required="">{{ $editor->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="published_at">Publish Date and Time</label>
        <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ $data->published_at }}" required="">
    </div>
    <div class="form-group">
        <label for="image1">Image1</label>
        <input type="file" class="form-control-file"  name="image1">
        @if($data->image1)
            <img src="{{ asset('News/' . $data->image1) }}" alt="Image1 Preview" style="max-width: 100px; max-height: 100px;">
        @endif
    </div>
    <div class="form-group">
        <label for="image2">Image2</label>
        <input type="file" class="form-control-file"  name="image2">
        @if($data->image2)
            <img src="{{ asset('News/' . $data->image2) }}" alt="Image2 Preview" style="max-width: 100px; max-height: 100px;">
        @endif
    </div>
    <div class="form-group">
        <label for="image3">Image3</label>
        <input type="file" class="form-control-file"  name="image3">
        @if($data->image3)
            <img src="{{ asset('News/' . $data->image3) }}" alt="Image3 Preview" style="max-width: 100px; max-height: 100px;">
        @endif>
    </div>
    <div class="form-group">
        <label for="image4">Image4</label>
        <input type="file" class="form-control-file"  name="image4">
        @if($data->image4)
            <img src="{{ asset('News/' . $data->image4) }}" alt="Image4 Preview" style="max-width: 100px; max-height: 100px;">
        @endif
    </div>


        <button type="submit" class="btn btn-primary">Save</button>

      </form>

    </div>
    @include("admin.adminscript");

    <script>
        CKEDITOR.replace('title');
        CKEDITOR.replace('content');
    </script>

  </body>
</html>


