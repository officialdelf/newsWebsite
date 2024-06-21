<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="/public">
    @include('css');
    @include('admin.admincss');
</head>
<body>
 <div class="container-scroller">
    @include("admin.navbar");

<div class="form"  >
    <h1><b>UPLOAD PROPERTY </b></h1>
    <form action="{{ url('/products') }}" method="POST" enctype="multipart/form-data" style="width:700px; height:500px; margin-left:40px;  align-items:center;">
        @csrf
        <div class="form-group">
          <label >Title</label>
          <input type="text" name="title" class="form-control"   placeholder="Enter title">
        </div>
        <div class="form-group">
          <label >Price</label>
          <input type="number" name="price" class="form-control"  placeholder="price">
        </div>
        <div class="form-group">
            <label >Location</label>
            <input type="text" name="location" class="form-control"  placeholder="location">
          </div>
          <div class="form-group">
            <label >Features</label>
            <input type="text" name="features" class="form-control"  placeholder="feature">
          </div>
          
        <div class="form-group">
            <label >Description</label>
            <input type="text" name="description" class="form-control"  placeholder="description">
          </div>
          <div class="form-group">
            <label>Product Video</label>
            <input type="file" name="video" class="form-control-file" >
          </div>
          <div class="form-group">
            <label>Product Image</label>
            <input type="file" name="image" class="form-control-file" >
          </div>
        <button type="submit" class="btn btn-primary">Save</button>

      </form>

 </div>
@include('js');
</body>
</html>
