@extends('layouts.app')
@section('content')
	<!-- full Title -->

  <div style="height: 50px;"></div>
    <!-- Page Content -->
    <div class="container">

     <!-- Content Row -->
     <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
            <h3>Send us a Message</h3>
            <form name="sentMessage" id="contactForm" method="POST" action="{{ route('contact.submit')}}">
              @csrf
              @if (session()->has('success'))
                <div class="col-md-12">
                    <div class="form-group alert btn-success">
                        Your Request was recorded successfully, Our Customer Care Representative will get back to you, Thank you.
                    </div>
                </div>
                @endif
                @if (session()->has('error'))
                    <div class="col-md-12">
                        <div class="form-group alert btn-danger">
                            Your Request was not recorded successfully, Please try again later.
                        </div>
                    </div>
                @endif
              <div class="control-group form-group">
                <div class="controls">
                  <label>Full Name:</label>
                  <input name="name" type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                  <p class="help-block"></p>
                </div>
              </div>
              <div class="control-group form-group">
                <div class="controls">
                  <label>Phone Number:</label>
                  <input name="phone_number" type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                </div>
              </div>
              <div class="control-group form-group">
                <div class="controls">
                  <label>Email Address:</label>
                  <input type="email" name="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                </div>
              </div>
              <div class="control-group form-group">
                <div class="controls">
                  <label>Message:</label>
                  <textarea name="message" rows="5" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                </div>
              </div>
              <div id="success"></div>
              <!-- For success/fail messages -->
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
            </form>
          </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4 contact-right mb-4">
        <div style="height: 10px;"></div>
          <h3>Our Contact Details</h3>

          <p>
            <abbr title="Phone">Phone</abbr>: 0715519228
          </p>
          <p>
            <abbr title="Email">Email</abbr>:
            <a href="mailto:junechep2002@gmail.com">junechep2002@gmail.com
            </a>
          </p>

        </div>
      </div>
      <!-- /.row -->


      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row mb-4">


      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection
