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
        .front-main {
            width: 100%;
            text-align: center;
            align-items: center;
            margin: px;
            border: 1px black;
            box-shadow: 1px grey;
            margin-bottom: 20px; /* Add margin between cards */
        }

        .front-main img {
            width: 100%;
            height: 100px;
        }

        img {
            object-fit: contain;
        }
    </style>
</head>

<body>
    @include('navbar', ['categories' => $categories])

    <div class="container-fluid">
        <div class="row d-flex">
            @foreach ($newsItem as $newsItem)
            <div class="col-md-3">
                <div class="front-main p-0 bg-light">
                    <a href="{{ route('details', ['id' => $newsItem->id, 'slug' => $newsItem->slug]) }}">
                        <h6 class="text-uppercase">{{ $newsItem->title }}</h6>
                        <img src="{{ asset('news/' . $newsItem->image1) }}" alt="Image 1"
                            style="object-fit: cover; ">
                        <div class="content">

                            <p class="text-dark">{{ \Illuminate\Support\Str::limit(strip_tags($newsItem->content), 100) }}.</p>
                        </div>
                    </a>
                </div>
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
