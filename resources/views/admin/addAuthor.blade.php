
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include("admin.admincss");

  </head>
  <body>
    <div class="container-scroller">
      @include("admin.navbar");

      <div class="form"  >
        @if(session()->has('message'))
        <div class="alert alert-success">
        {{session()->get('message')}}
        <button type="button" class="close" items-dismiss="alert">x</button>

        </div>
        @endif
    <form action="{{url('/addAuthor') }}" method="POST">
        @csrf
        <div class="form-group">
          <label >Name</label>
          <input type="text" class="form-control" name="name" placeholder="Enter name">
        </div>


        <button type="submit" class="btn btn-primary">Save</button>

      </form>
    </div>
    @include("admin.adminscript");


  </body>
</html>

