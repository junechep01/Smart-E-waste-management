@extends('layouts.app') 
@section('content')  
	<!-- full Title -->
  <div style="height: 30px;"></div>

  


    <!-- Page Content -->
    <div class="container" >
      <section class="contact spad mb-4"  style="background-color: #f5f5f5;">
        <div class="container">
          <div class="container">
            <div class="row">
              <div class="col-md-6 pr-4 form-container">
                <h3 class="mb-3">LOGIN</h3>
                <form action="{{ route ('user.login')}}" method="POST">
                    @csrf <!-- CSRF Field -->
                    <div class="form-group required mb-2">
                        <label for="email" class="control-label">Username or email address</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email') 
                        <div class="mt-2 mb-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group required mb-2">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')
                        <div class="mt-2 mb-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <button type="submit" class="btn btn-primary mt-2 pl-4 pr-4">LOG IN</button>
                    @if (session('error')) 
                    <div class="mb-2 mt-2alert alert-danger mt-2">
                        {{ session('error') }} 
                    </div>
                    @endif
                    <p class="mt-2"><a style="color: black;" href="#">Forgot your password?</a></p>
                </form>
              </div>
  
                
                <div class="col-md-6 form-container">
                    <h3>Register</h3>
                    @if(session('success'))
                        <div class="alert mt-2 alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('user.register')}}" method="POST">
                      @csrf 
                      <div class="form-group required">
                        <label for="email" class="control-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('r_email') }}" required>
                        @error('r_email')
                            <div class="alert alert-danger mb-2 mt-2">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group required">
                        <label for="email" class="control-label">Address</label>
                        <input type="r_email" class="form-control" id="address" name="address" value="{{ old('r_email') }}" required>
                        @error('address')
                            <div class="alert alert-danger mb-2 mt-2">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group required">
                        <label for="email" class="control-label">Phone Number</label>
                        <input type="r_email" class="form-control" id="phone_number" name="phone_number" value="{{ old('r_email') }}" required>
                        @error('r_number')
                            <div class="alert alert-danger mb-2 mt-2">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group required">
                          <label for="email" class="control-label">Email address</label>
                          <input type="r_email" class="form-control" id="r_email" name="r_email" value="{{ old('r_email') }}" required>
                          @error('r_email')
                              <div class="alert alert-danger mb-2 mt-2">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group required mb-2">
                          <label for="r_password" class="control-label">Password</label>
                          <input type="password" class="form-control" id="r_password" name="r_password" required>
                          @error('r_password')
                              <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group required mb-2">
                          <label for="confirm-password" class="control-label">Confirm Password</label>
                          <input type="password" class="form-control" id="confirm-password" name="r_password_confirmation" required>
                          @error('r_password_confirmation')
                              <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                          @enderror
                      </div>
                      <p class="mt-2">
                          Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a style="color: black;" href="#">privacy policy.</a>
                      </p>
                      <button type="submit" class="btn btn-success pl-4 pr-4">REGISTER</button>
                    </form>
  
  
                </div>
            </div>
        </div>
        </div>

    </div>
    <!-- /.container -->
@endsection