<!--</pre>{//print_r($newsItemss, true) }}</pre> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Social Media Meta Tags -->
    <meta property="og:title" content="{{ $newsItems->title }}">
    <meta property="og:description" content="{{ $newsItems->content }}">
    <meta property="og:image" content="{{ asset('news/' . $newsItems->image1) }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $newsItems->title }}">
    <meta name="twitter:description" content="{{ $newsItems->content }}">
    <meta name="twitter:image" content="{{ asset('news/' . $newsItems->image1) }}">
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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .front-main{
            width: 100%;
            text-align: center;
            align-items: center;

        }
        img{
            object-fit: contain;
        }
        <style>
    /* Style for the comment section */
    .comment {
        margin-top: 20px;
        border: 1px solid #ccc;
        padding: 20px;
        background-color: #f9f9f9;
    }

    /* Style for the "Leave a comment" heading */
    .comment h2 {
        font-size: 24px;
        color: #333;
    }

    /* Style for the comment form */
    .comment form {
        margin-top: 20px;
    }

    /* Style for the comment textarea */
    .comment form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        resize: vertical;
    }

    /* Style for the "Post Comment" button */
    .comment form button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    /* Style for the comments */
    .comment div {
        margin-top: 20px;
        padding: 10px;
        border: 1px solid #ddd;
        background-color: #fff;
    }

    /* Style for the user profile image in comments */
    .comment div img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 10px;
    }

    /* Style for the comment content */
    .comment div p {
        margin: 0;
        font-size: 16px;
        color: #333;
    }

    /* Style for the "No comments yet" message */
    .comment p.no-comments {
        font-size: 16px;
        color: #333;
    }
    .prof-image{
        border-radius: 50%;
    }
</style>

</head>
<body>
    @include('navbar', ['categories' => $categories]);

    <div class="container-fluid">
        <div class="row d-flex" style="margin-left:;">

            <div class="col-md-9 front-main" style="background: white; margin-top:0;;">
                <h2 class="m-0 text-uppercase font-weight-bold" style="color:black;"><a class="text-body" href="">{{ $newsItems->title }}</a> </h2>
                                <!-- date posted -->

<div class="d-flex" style="margin-top: 30px;">
    <h5 style="color: black"><b>Posted on:</b></h5>
    <p style="color: black"><i>{{  $newsItems->published_at }}</i></p>

    </div>

                <!-- Social Media Sharing Links -->
    <div class="d-flex" style="padding: 10px;">
        <h5 style="color: black"><b>Share:</b></h5>
        <!-- Facebook Share Link -->
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}" target="_blank" rel="noopener noreferrer" style="margin-left: 20px;">
            <img src="{{ asset('images/facebook.jpg') }}" alt="Image 1" style=" height:30px; width:30px; object-fit:contain;">
        </a>

        <!-- WhatsApp Share Link -->
        <a href="https://api.whatsapp.com/send?text={{ request()->url() }}" target="_blank" rel="noopener noreferrer" style="margin-left: 20px;">
            <img src="{{ asset('images/whatsApp.jpg') }}" alt="Image 1" style=" height:30px; width:30px; object-fit:contain; border-radius:50%;">
        </a>

        <!-- Gmail Share Link -->
        <a href="mailto:?subject={{ $newsItems->title }}&body={{ request()->url() }}" target="_blank" rel="noopener noreferrer" style="margin-left: 20px;">
            <img src="{{ asset('images/gmail.jpg') }}" alt="Image 1" style=" height:30px; width:30px; object-fit:contain;">
        </a>

        <!-- Instagram Share Link (Note: Instagram sharing is limited due to platform restrictions) -->
        <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" style="margin-left: 20px;">
            <img src="{{ asset('images/instagram.jpg') }}" alt="Image 1" style=" height:30px; width:30px; object-fit:contain;">
        </a>

        <!-- TikTok Share Link (Note: TikTok sharing is limited due to platform restrictions) -->
        <a href="https://www.tiktok.com/" target="_blank" rel="noopener noreferrer" style="margin-left: 20px;">
            <img src="{{ asset('images/tiktok.jpg') }}" alt="Image 1" style=" height:30px; width:30px; object-fit:contain;">
        </a>

        <!-- YouTube Share Link -->
        <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer" style="margin-left: 20px;">
            <img src="{{ asset('images/youtube.jpg') }}" alt="Image 1" style=" height:40px; width:30px; object-fit:contain;">
        </a>
    </div>

                <img src="{{ asset('news/' . $newsItems->image1) }}" alt="Image 1" style=" height:900px; width:100%; object-fit:cover;">


                <div class="content">
                    {!! $newsItems->content !!}
                </div>

            </div>
            <div class="col-md-3">
                @foreach($related as $rel)

                 <!--Social Follow End -->

                        <!--img class="img-fluid w-100" src="news/" style="align-items:center; height:120px; object-fit:cover;"-->
                        <a href="{{ route('details', ['id' => $rel->id, 'slug' => $rel->slug]) }}">

                            <img src="{{ asset('news/' . $rel->image1)}}" alt="Image 1" style="height:200px;  object-fit:cover; justify-content:center;">

                        <div class="content">
                           <!--small class="m-0 text-uppercase" style="color: #333;">{$rel->published_at}}</small-->
                        <p class="m-0 text-dark font-weight-bold" style="object-fit: cover; "><b>{{ $rel->title }}</b></p>

                        </div>

                        </a>

                @endforeach



            </div>

            </div>
        </div>
    </div>
    <div class="comment" style="border:1px#d38714">
        <h2>Leave a comment</h2>
        @auth
    <form action="{{ route('comments', $newsItems->id) }}" method="post">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control" placeholder="Write a comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Post Comment</button>
    </form>
@else
    <p>Please <a href="{{ route('login') }}">login</a> to post comments.</p>
@endauth

<!-- Display Comments -->
<h3>Comments</h3>

@if ($newsItems->comments->count() > 0)
    @foreach ($newsItems->comments as $comment)
        <div>
            <!-- Check if profile_image_url exists before using it -->
            @if ($comment->user && $comment->user->profile_image)
            <!-- If user has uploaded a profile image, display it -->
            <img src="{{ asset('images/' . $comment->user->profile_image) }}" class="prof-image" alt="Profile Image">
        @else
            <!-- If user has not uploaded a profile image, display default image -->
            <img src="{{ asset('images/defaultNews.jfif') }}"  class="prof-image" alt="Default Profile Image">
        @endif

                <p>{{ $comment->user->name }}</p>

            <p>{{ $comment->content }}</p>
            <h5>{{ date( 'F jS, Y', strtotime( $newsItems -> created_at ) ) }}</h5>

        </div>
    @endforeach
@else
    <p>No comments yet.</p>
@endif


        <!--p>{//$comment->content }}</p-->

<!-- Display Related News -->
@if ($related->count() > 0)
    <h3>Related News</h3>
    @foreach ($related as $rel)
        <p>{{ $rel->title }}</p>
        <!-- Display other related news information as needed -->
    @endforeach
@else
    <p>...</p>
@endif


    </div>

     <!-- Footer Start -->
     @include('footer', ['categories' => $categories, 'topNews' => $topNews])
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

