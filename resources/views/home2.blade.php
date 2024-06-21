
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <link href="css/style.min.css" rel="stylesheet">

    <style>
        .front-main{
            width: 100%;
            text-align: center;
            align-items: center;

        }
        img{
            object-fit: contain;
        }
        a{
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>
<body>
@include('navbar');

    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-9 front-main" style="background: white; margin-top:0;">
                @foreach ($front as $front )

                    <h1 class="m-0 text-uppercase font-weight-bold"><a href="{{ url('details', ['id' => $front->id,'slug' => $front->slug]) }}" style="color: inherit; text-decoration: none;">{{ $front->title}}</a> </h1>

                    <img class="img-fluid w-100" src="news/{{ $front->image1}}">
                    <div class="content">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">{{ $front->category}}</a>
                         <p>{{ \Illuminate\Support\Str::limit(strip_tags($front->content), 500) }}.</p>
                </div>
            @endforeach
            </div>
            <div class="col-md-3">

                 <!--Social Follow End -->


                    @foreach ($side as $side )
                    <a href="{{ url('details', ['id' => $side->id,'slug' => $side->slug]) }}" style="color: inherit; text-decoration: none;">                        <img class="img-fluid w-100" src="news/{{ $side->image1}}" style="align-items:center; height:120px; object-fit:cover;">
                        <div class="content">
                           <h4 class="m-0 text-uppercase font-weight-bold">{{ $side->category }}</h4>
                        <p class="m-0 text-dark font-weight-bold">{{ $side->title }}</p>
                        </div>
                    </a>
                     @endforeach
                     @include('newsletter');


            </div>

            </div>
        </div>
    </div>
    <div class="container-fluid mt-40px" style="background: white;">
        <h3>Top News</h3>
        <hr class="bg-warning my-0">

        <div class="row top-news">
           <div class="col-md-9">
            <div class="row">
                @foreach ($topNews as $topNews )
                <div class="col-md-6 d-flex">
                    <hr class="bg-danger">
                    <img class="img-fluid" src="news/{{ $topNews->image1}}" width="100px" height="200px">

                    <div class="new">
                    <p style="color:black;"><b>{{ $topNews->title }}</b></p>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($topNews->content), 70) }}.<span class="text-warning"><a href="{{ url('details', ['id' => $topNews->id,'slug' => $topNews->slug]) }}" style="color: inherit; text-decoration: none;">
                            Read more</a></span></p>
                    </div>

                </div>

                @endforeach
            </div>
           </div>

                 @include('follow');
             <!--Social Follow End -->
            </div>
    </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <h2>Top Business news</h2>
                    <hr class="bg-danger">


                    <div class="row">

                        @foreach ($topBusinessNews as $businessNews )
                        <div class="col-md-6 d-flex">
                                <img class="img-fluid" src="news/{{ $businessNews->image1}}" width="100px" height="200px">
                                <div class="new">
                                    <p style="color:black;"><b>{{ $businessNews->title }}</b></p>
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($businessNews->content), 70) }}.<span class="text-warning"><a href="{{ url('details', ['id' => $businessNews->id,'slug' => $businessNews->slug]) }}" style="color: inherit; text-decoration: none;">
                                        Read more</a></span></p>
                                </div>


                        </div>

                        @endforeach
                    </div>
                </div>


                <div class="col-md-3 mt-3">
                    @include('newsletter');
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <h2>Top Sports news</h2>
                    <hr class="bg-danger">

                    <div class="row">
                        @foreach ($topSportsNews as $topSportsNews )
                        <div class="col-md-6 d-flex">
                                <img class="img-fluid" src="news/{{ $topSportsNews->image1}}" width="100px" height="200px">
                                <div class="new">
                                    <p style="color:black;"><b>{{ $topSportsNews->title }}</b></p>
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($topSportsNews->content), 70) }}.<span class="text-warning"><a href="{{ url('details', ['id' => $businessNews->id,'slug' => $businessNews->slug]) }}" style="color: inherit; text-decoration: none;">
                                        Read more</a></span></p>
                                </div>


                        </div>

                        @endforeach         
                    </div>
                </div>


                <div class="col-md-3 mt-3">
                    <h2>Popular News</h2>
                    <div class="row">
                @foreach ($popular as $popular )
                <a href="{{ url('details', ['id' => $popular->id,'slug' => $popular->slug]) }}" style="color: inherit; text-decoration: none;">
                        <hr class="bg-danger">
                    <img class="img-fluid" src="news/{{ $popular->image1}}" width="100%;"  style="object-fit:cover; height:100px;">

                    <div class="new">
                    <p style="color:black;"><b>{{ $popular->title }}</b></p>
                    </div>
                    </a>
                @endforeach
            </div>
                </div>
            </div>
        </div>
        </div>

     <!-- Footer Start -->
     <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
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
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                </div>
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                </div>
                <div class="">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
                <div class="m-n1">
                    <a href="" class="btn btn-sm btn-secondary m-1">Politics</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Corporate</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Health</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Education</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Science</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Foods</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Entertainment</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Travel</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Lifestyle</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Politics</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Corporate</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Health</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Education</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Science</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Foods</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5>
                <div class="row">
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">Your Site Name</a>. All Rights Reserved.

        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Design by <a href="https://htmlcodex.com">HTML Codex</a><br>
        Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>



</body>
</html>
