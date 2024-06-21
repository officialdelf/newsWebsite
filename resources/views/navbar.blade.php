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
</head>
<body>
    <div class="container-fluid d-none d-lg-block bg-dark">
        <div class="row align-items-center bg-dark px-lg-5">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">{{ date('F j, Y \a\t h:i A'); }}</a>

                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Advertise</a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Contact</a>
                    </li>

                </ul>
            </nav>
            <div class="row align-items-center  py-3 px-lg-5">
                <div class="col-lg-8 bg-white">
                    <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-secondary font-weight-normal  bg-white">News</span></h1>
                    </a>
                </div>
                <div class="col-lg-3 text-center text-lg-right d-lg-block">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">
                            {{-- Get the logged-in user --}}
                            @php
                                $user = auth()->user();
                            @endphp

                            {{-- Display the first two letters of the user's name --}}
                            @if ($user)
                                <div class="" style="background-color: orange; padding: 10px; border-radius:50%; color:antiquewhite;width:50px; text-align:center;">
                                    {{ substr($user->name, 0, 2) }}
                                </div>
                            @elseif (!$user)
                            <p>login</p>
                            @endif
                        </a>

                    </li>

                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3 bg-dark" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0" style="font-size:0.7rem;">
                    @foreach ($categories as $category )

                    <a href="{{ url('/showByCategory',$category) }}" class="nav-item nav-link">{{$category->name}}</a>

    @endforeach

                    <a href="contact.html" class="nav-item nav-link" style="font-size:0.7rem;">Contact</a>
                </div>
                <div class="input-group ml-auto d-none d-lg-flex bg-dark" style="width: 100%; max-width: 300px; font-size:0.5rem;">
                    <form method="post" action="{{ route('search') }}">


                        @csrf

                        <input type="text" class="form-control border-0" placeholder="search" name="search">
                    <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3"><i
                                class="fa fa-search"></i><input type="submit"></button>
                    </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>

</body>
</html>
