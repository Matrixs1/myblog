<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog Single - Tempo Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Tempo - v4.10.0
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Tempo</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>

          <li><a class="active" href="{{url('/')}}">Blog</a></li>
          
          @if (Route::has('login'))
              
                    @auth
                    <li style="color:white;">    {{ Auth::user()->name }}</li>
                    <li class="nav-item dropdown">
                            

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    @else
                    <li> <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                        @if (Route::has('register'))
                        <li> <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                      
                        @endif
                    @endauth
                
            @endif
   
                                    </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
<!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
      @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <ol>
          <li><a href="index.html">Home</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li>Blog Single</li>
        </ol>
        <h2>Blog Single</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{url('/')}}">{{$single_post->title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="">{{$single_post->author}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href=""><time datetime="2020-01-01">{{$single_post->date}}</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="">{{$comment_count}} Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">


                <img src="/posts/{{$single_post->image}}" class="img-fluid" alt="">
                <br><br>
                <div class="entry-meta">
                <ul>
                <li class="d-flex align-items-center"><a class="btn btn-primary" style="color:white" href="{{url('update_post',$single_post->id)}}"> Update</a></li>
                <li class="d-flex align-items-center"><a class="btn btn-danger" onclick="return confirm('Are you sure you want delete this?')" style="color:white" href="{{url('delete_post',$single_post->id)}}">Delete</a></li>
              </ul>
            </div>
                <br><br>
                <p>
                {{$single_post->content}}
                </p>

              </div>

          
            </article><!-- End blog entry -->
            <div class="blog-comments">
                @if($comment_count > "0")
                <h4 class="comments-count"> Comments {{$comment_count}}</h4>
                @else
                <h4 class="comments-count"> Comments 0</h4>

                @endif
                @foreach($show_comment as $show_comment)

              <div id="comment-1" class="comment">
                <div class="d-flex">
                  
                  <div>
                    <h5><p>{{$show_comment->name}}</p> 
                    <time datetime="2020-01-01">{{$show_comment->date}}</time>
                    <p>
                      
                        {{$show_comment->comment}}

                    </p>
                  </div>
                </div>
              </div><!-- End comment #1 -->

            @endforeach
    <!-- End comment #4 -->

              <div class="reply-form">
                <h4>Leave a Comment</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="{{url('create_comment',$single_post->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" value="{{auth::user()->name}}" readonly>
                    </div>
               
                  </div>
                  <div class="row">
                   
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Post Comment</button>
                
                </form>

              </div>

            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->

          <div class="col-lg-18">

       
          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>s