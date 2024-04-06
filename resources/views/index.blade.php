@extends('layouts.app') 
@section('content')  
   
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active" style="background-image: url('images/slider.jpg')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>Welcome to EcoTech Solutions</h3>
                     <p>An  E-Waste Management Platform</p>
                  </div>
               </div>
               <div class="carousel-item" style="background-image: url('images/slider-1.jpg')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>E-Waste Management Platform</h3>
                     <p>We Create a better world</p>
                  </div>
               </div>
               <div class="carousel-item" style="background-image: url('images/slider-3.jpg')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>Welcome to EcoTech Solutions</h3>
                     <p>An  E-Waste Management Platform</p>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
            </a>
        </div>
    
    <div class="container">

      
        
        <!-- About Section -->
        <div class="about-main">
            <div class="row">
               <div class="col-lg-6">
                  <h2>Welcome to EcoTech Solutions</h2>
                  <p>
                     At EcoTech Solutions, we are dedicated to pioneering sustainable practices in the realm of electronic waste management. With a commitment to environmental stewardship and innovation, we strive to mitigate the impact of e-waste on our planet. Our team of experts employs cutting-edge technology to provide comprehensive e-waste recycling and disposal services, ensuring that every piece of electronic waste is processed with the utmost care for the environment.
                  </p>

                  

                
                  <h5>Our smart approach</h5>
                  <ul>
                     <li>E-Waste Recycling</li>
                     <li>Data Destruction.</li>
                     <li>Corporate E-Waste Solutions.</li>
                  </ul>
                  <div class="mt-2 mb-2">
                     <a class="btn btn-lg btn-secondary btn-block" href="{{ route('user.request') }}">Make A Collection Request</a>
                  </div>
               </div>
               <div class="col-lg-6">
                  <img class="img-fluid rounded" src="{{ asset('images/about.jpg')}}" alt="" />
               </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- Portfolio Section -->
  
        <hr>
        <!-- Get In Touch Now Section -->
       
        </div>
    </div>
   @endsection