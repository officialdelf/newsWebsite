
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <style>
            .col-md-4{
            }

        </style>
</head>
<body>
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-md-3">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>

            </div>
            <div class="col-md-2 " style="">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>

                @foreach ($categories as $category )
                <a href="" class="btn btn-sm btn-secondary m-1">{{$category->name}}</a>


                @endforeach
            </div>
            <div class="col-md-3">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>

                @foreach ($topNews as $topNews )
                @php
                // Retrieve the category name for the current news item
                $categoryName = $categories->where('id', $topNews->category)->first()->name ?? '';
            @endphp

                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{$categoryName }}</a>
                    <a class="text-body" href=""><small>{{ $topNews->created_at->format('F j, Y \a\t h:i A') }}</small></a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="">{{ \Illuminate\Support\Str::limit(strip_tags($topNews->content), 100) }}....</a>
<br><br>

                <small></small>
                @endforeach
            </div>
            <div class="col-md-4">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Latest News</h5>


                @foreach ($latestNews as $latestNewsItem)
    @php
        // Retrieve the category name for the current latest news item
        $latestcategoryName = $categories->where('id', $latestNewsItem->category)->first()->name ?? '';
    @endphp
    <div class="mb-2 d-flex">
        <div class="imgL">
            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{ route('details', ['id' => $latestNewsItem->id, 'slug' => $latestNewsItem->slug]) }}">
        <img src="{{ asset('news/' . $latestNewsItem->image1 )}}" alt="" style="height:80px; width:80px; border:1px white;">

 </a>
        </div>
        <div class="cont">
            <a class="small text-body text-uppercase font-weight-medium" href="{{ route('details', ['id' => $latestNewsItem->id, 'slug' => $latestNewsItem->slug]) }}">
                {{ \Illuminate\Support\Str::limit(strip_tags($latestNewsItem->content), 100) }}....
            </a>
            <a class="text-body" href="{{ route('details', ['id' => $latestNewsItem->id, 'slug' => $latestNewsItem->slug]) }}">
                <small>{{ $latestNewsItem->created_at->format('F j, Y \a\t h:i A') }}</small>
            </a>
        </div>
    </div>

    <br><br>
@endforeach

            </div>


        </div>

    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">BizNews</a>. All Rights Reserved.

        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Design by <a href="">Delfin Kerubo</a><br>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript
    //https://kayretail.000webhostapp.com/com/index.php

    -->
    <script src="js/main.js"></script>

</body>
</html>
