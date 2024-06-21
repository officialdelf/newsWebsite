
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include("admin.admincss");
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

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
    <form action="{{url('/addNews') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required>

        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category" id="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <select class="form-control" name="author" id="author">
              @foreach($authors as $author)
                  <option value="{{ $author->id }}">{{ $author->name }}</option>
              @endforeach
          </select>
      </div>
      <div class="form-group">
        <label for="editor">editor</label>
        <select class="form-control" name="editor" id="editor">
            @foreach($editors as $editor)
                <option value="{{ $editor->id }}">{{ $editor->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="published_at">Publish Date and Time</label>
        <input type="datetime-local" class="form-control" id="published_at" name="published_at" required>
    </div>
    <div class="form-group">
        <label for="image1">Image1</label>
        <input type="file" class="form-control-file"  name="image1">
    </div>
    <div class="form-group">
        <label for="image2">Image2</label>
        <input type="file" class="form-control-file"  name="image2">
    </div>
    <div class="form-group">
        <label for="image3">Image3</label>
        <input type="file" class="form-control-file"  name="image3">
    </div>
    <div class="form-group">
        <label for="image4">Image4</label>
        <input type="file" class="form-control-file"  name="image4">
    </div>
    <div class="form-group">
        <label for="title">Caption</label>
        <input type="text" class="form-control" name="caption" id="caption">
    </div>


        <button type="submit" class="btn btn-primary">Save</button>

      </form>

    </div>
    @include("admin.adminscript");

    <script>
        console.log("Initializing CKEditor...");
        CKEDITOR.replace('content');

    </script>

  </body>
</html>

