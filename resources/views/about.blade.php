@extends('layouts.app') 
@section('content')  
		<!-- About Content -->
		
		<div style="height: 50px;"></div>
		<div class="about-main m-4" >
			<div class="row">
				<div class="col-lg-6">
					<img class="img-fluid rounded" src="{{ asset('images/about.jpg')}}" alt="" />
				</div>
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
                  <p>At EcoTech Solutions, we believe in a future where every piece of electronic waste is recycled or disposed of in a way that benefits our planet. Join us in making a difference, one device at a time.</p>
               </div>
				</div>
			</div>
			<!-- /.row -->

			<div class="row m-4">
            <div class="col-md-8">
               <p>At EcoTech Solutions, we believe in a future where every piece of electronic waste is recycled or disposed of in a way that benefits our planet. Join us in making a difference, one device at a time.</p>
            </div>
            <div class="col-md-4">
               <a class="btn btn-lg btn-secondary btn-block" href="{{ route('contact') }}">Get In Touch Now</a>
            </div>
        </div>
		</div>
	</div>

@endsection