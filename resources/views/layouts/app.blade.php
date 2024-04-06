<?php
$blogs = App\Models\Blogs::latest()->take(3)->get();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/logo-1.png') }}">
	<title>EcoTech Solutions </title>
	<!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6vP0k0GtQ3hBnBMvsp0UvjMXhoMJkbiyKH5gFuiF4mXJtkp6RVj8aPyQ8h3jD7T" crossorigin="anonymous">

</head>
<body>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark top-nav fixed-top" >
        <div class="container">
			<a class="navbar-brand d-none d-lg-block" href="/">
				<img src="{{ asset('images/logo-1.png')}}" alt="logo"  height="65px"class="logo-small" />
			</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link  mr-2 {{ request()->routeIs('home') ? 'active' : '' }} " href="{{ route('home')}}">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class=" nav-link mr-2 {{ request()->routeIs('about') ? 'active' : '' }} " href="{{ route('about')}}">About</a>
                  </li>
				  <li class="nav-item">
                     <a class=" nav-link mr-2 {{ request()->routeIs('user.blogs') ? 'active' : '' }} " href="{{ route('user.blogs')}}">Blogs</a>
                  </li>
				  <li class="nav-item">
                     <a class=" nav-link mr-2 {{ request()->routeIs('user.request') ? 'active' : '' }} " href="{{ route('user.request')}}">Make Request</a>
                  </li>

                  <!-- <li class="nav-item mr-2 dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Portfolio
                     </a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
                     </div>
                  </li>
                  <li class="nav-item mr-2 dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Blog
                     </a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
                        <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
                        <a class="dropdown-item" href="blog-post.html">Blog Post</a>
                     </div>
                  </li> -->

                  <li class="nav-item mr-2">
                     <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }} " href="{{ route ('contact')}}">Contact</a>
                  </li>
                  <li class="nav-item mr-2">
                     @if(Auth::check())
                        <a class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">My Account</a>
                     @else
                        <a class="nav-link  {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">SIGN IN</a>
                     @endif

                  </li>
               </ul>
            </div>
        </div>
    </nav>
    <header class="slider-main" style="background-color: #f7f7f7;">


    @yield('content')

     <!-- /.container -->
    <!--footer starts from here-->
    <footer class="footer">
        <div class="container bottom_border">
            <div class="row">
               <div class="col-lg-4 col-md-6 col-sm-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
					<!--headin5_amrc-->
					<p> 0715519228  </p>
					<p>junechep2002@gmail.com  </p>
               </div>

				<div class="col-lg-4 col-md-6 col-sm-6">
					<h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
					<!--headin5_amrc-->
					<ul class="footer_ul_amrc">
						<li><a href="{{route('home')}}">Home</a></li>
						<li><a href="{{route('contact')}}">Contact Us </a></li>
						<li><a href="{{route('user.blogs')}}">Blogs </a></li>
						<li><a href="{{route('about')}}">About Us</a></li>
					</ul>
					<!--footer_ul_amrc ends here-->
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 ">
					<h5 class="headin5_amrc col_white_amrc pt2">Recent posts</h5>
					<!--headin5_amrc-->
					<ul class="footer_ul_amrc">
               @foreach($blogs as $relatedPost)
						<li class="media">
							<div class="media-left">
								<img class="img-fluid" src="images/post-img-01.jpg" alt="" />
							</div>
                     <a href="{{ route('blogs.show', ['id' => $relatedPost->id]) }}">
                        <div class="media-body">
                           <p class="card-text">{{$relatedPost->title}}</p>
                           <span> {{ $relatedPost->created_at->format('F j, Y') }}</span>
                        </div>
                     </a>
						</li>
               @endforeach

					</ul>
					<!--footer_ul_amrc ends here-->
				</div>
			</div>
		</div>

    </footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
