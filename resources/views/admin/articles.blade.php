<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include("admin.admincss");
</head>
<body>

            <!-- Required meta tags -->

            <div class="container-scroller">
              @include("admin.navbar");
             <div style="position:relative; top:60px; right:-60px">
                 <table class="bg-light text-dark" >
                     <tr>
                         <th style="padding: 30px"><b>Title</b></th>
                         <th  style="padding: 30px"><b>Category</b></th>
                         <th  style="padding: 30px"><b>Caption</b></th>
                         <th  style="padding: 30px"><b>content</b></th>
                         <th  style="padding: 30px"><b>Author</b></th>
                         <th  style="padding: 30px"><b>Editor</b></th>
                         <th  style="padding: 30px"><b>Image1</b></th>
                         <th  style="padding: 30px"><b>Image2</b></th>
                         <th  style="padding: 30px"><b>Image3</b></th>
                         <th  style="padding: 30px"><b>Image4</b></th>
                         <th  style="padding: 30px"><b>Action</b></th>
                     </tr>
                     @foreach ($data as $data )
                     <tr align="center"style="border: 1px solid rgb(233, 11, 11);" >
                         <td>{{$data->title}}</td>
                         <td>{{$data->category}}</td>
                         <td>{{$data->caption}}</td>
                         <textarea class="form-control" name="content" id="content" rows="5" value="{{ \Illuminate\Support\Str::limit(strip_tags($data->content), 30) }}..." required=""></textarea>

                         <td>{{$data->author}}</td>
                         <td>{{$data->editor}}</td>
                         <td>
                            <img  style="height:100px; width:100px;" src="/News/{{$data->image1 }}"></a>
                         </td>
                         <td>
                            <img  style="height:100px; width:100px;" src="/news/{{$data->image2 }}"></a>
                         </td>
                         <td>
                            <img  style="height:100px; width:100px;" src="/news/{{$data->image3 }}"></a>
                         </td>
                         <td>
                            <img  style="height:100px; width:100px;" src="/news/{{$data->image4 }}"></a>
                         </td>
                         <td style="padding:15px;">
                            <a href="{{url('/edit_article',$data->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('/delete_article',$data->id)}}" class="btn btn-danger">Delete</a>

                        </td>
                         <br>

                     </tr>
                     @endforeach

                 </table>
             </div>

            </div>
            @include("admin.adminscript");


          </body>
        </html>


</body>
</html>
