<!--</pre>{//print_r($newsItems, true) }}</pre> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta property="og:title" content="Your News Article Title">
    <!-- social media-->
    <!-- Open Graph Meta Tags -->


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>


    <style>
        body {
    margin: 0;
}

        .container{
            margin-left: 0em;
            margin-right:0em;


        }
        .col-md-3{
            margin-right:0;
            margin-left: 0px;

        }
        .col-md-9{
            margin-right: 0em;
            margin-left: 0em;

        }
        .row{
            margin-right: 0em;
            margin-left: 0em;

        }
        .col-md-3 img{
            height: 150px;
            object-fit: cover;
        }
        .col-md-9 img{
            height: 150px;
            object-fit: cover;
        }
        .share{
            margin:10px;
        }
        .share a{
            text-decoration:none;
            color:inherit;
            margin-left:10px;
        }
    </style>
</head>
<body>
<!-- resources/views/other_page.blade.php -->

@include('navbar', ['categories' => $categories])

<!-- Rest of your content for the other page goes here -->

<!-- newsDetails.blade.php -->
<div class="container">
    <div class="row details d-flex">

        <div class="col-md-9">

            <h1><b>{{ $newsItems->title }}</b></h1>
            <p><b>Posted on:</b></p>
            <div class="share d-flex">
<p><b>Share:</b></p>                <!-- Twitter Share Button -->

            </div>
<img src="{{ asset('news/' . $newsItems->image1) }}" alt="Image 1" style=" height:300px;  object-fit:cover; justify-content:center;">
<!--img src="{//asset('news/' . $newsItems->image2) }}" alt="Image 2"-->
<!--img src="{// asset('news/' . $newsItems->image3) }}" alt="Image 3"-->
{!! $newsItems->content !!}



        </div>


        @foreach($related as $rel)

        <div class="col-md-3 bg-light">

<img src="{{ asset('news/' . $rel->image1) }}" alt="Image 1">
<p><b>{{ $rel->title }}</b></p>
        </div>
        @endforeach
    </div>
</div>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
