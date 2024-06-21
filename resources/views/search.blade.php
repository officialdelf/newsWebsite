<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <style>
        .front-main{
            width: 100%;
            text-align: center;
            align-items: center;
            margin: px;
            border: 1px black;
            box-shadow: 1px grey
        }
        .front-main img{
            width:100%;
            height: 100px;

        }
        img{
            object-fit: contain;
        }
    </style>
</head>
<body>
    @include('navbar', ['categories' => $categories])



    <div class="container-fluid">
        <h2 class="text-center" style="margin-bottom: 20px;">Results for search</h2>


        <div class="row d-flex">
            @foreach ($data as $data)

    <div class="col-md-2 front-main p-0 bg-light" style="margin: 20px;">
        <a href="{{ route('details', ['id' => $data->id, 'slug' => $data->slug]) }}">
            <h6 class="text-uppercase">{{ $data->title }}</h6>
            <img src="{{ asset('news/' . $data->image1) }}" alt="Image 1" style="object-fit:contain; justify-content-center; height:100px;">
            <div class="content">
                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-0 mr-0" href="">{{ $data->category }}</a>
                <p>{{ \Illuminate\Support\Str::limit(strip_tags($data->content), 100) }}.</p>
            </div>
        </a>
    </div>
@endforeach


        </div>
    </div>



    @include('footer', ['categories' => $categories, 'topNews' => $topNews])


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>



</body>
</html>
