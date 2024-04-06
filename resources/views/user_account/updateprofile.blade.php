@extends('layouts.app') 
@section('content')  
	<!-- full Title -->
  <div style="height: 70px;"></div>

  


    <!-- Page Content -->
    <div class="container" >

        <h3 class="my-4 text-center">My Account</h3>
      <section class="contact spad mb-4"  style="background-color: #f5f5f5;">
        <section class="contact spad mb-4"  style="background-color: #f5f5f5;">
            <div class="container">
                    <div class="row pl-4">
              <!-- Sidebar navigation -->
              <div class="col-md-3 dashboard-menu">
                <div class="list-group text-center">
                <a href="{{ route('user.dashboard') }}" class="list-group-item  list-group-item-action mb-2">Dashboard</a>
                    <a href="{{ route('user.request') }}" class="list-group-item list-group-item-action mb-2">Collect Request</a>
                    <a href="{{ route('user.orders') }}" class="list-group-item list-group-item-action mb-2">My Ewaste Collections</a>
                    <a href="{{ route('account.details') }}" class="list-group-item list-group-item-action  mb-2">Account Details</a>
                    <a href="{{ route('user.update') }}" class="list-group-item active list-group-item-action mb-2">Update Account</a>
                    <a href="{{ route('user.logout') }}" class="list-group-item list-group-item-action mb-2">Log Out</a>
                    <!-- More links -->
                </div>
              </div>
              <!-- Main content -->
                <div class="col-md-9 pl-3">
                    <form action="{{ route('user.profile.update') }}" method="post">
                        @csrf
                        @method('put')
                    
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name*</label>
                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    name="name"
                                    value="{{ auth()->user()->name }}"
                                    placeholder="First Name"
                                    required
                                />
                            </div>
                    
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    name="address"
                                    placeholder="Last Name"
                                    value="{{ auth()->user()->address }}"
                                />
                            </div>
                        </div>
                    
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email Address</label>
                                <input
                                    type="email"
                                    class="form-control form-control-lg"
                                    name="email"
                                    placeholder="Email"
                                    value="{{ auth()->user()->email }}"
                                    required
                                />
                            </div>
                    
                            <div class="form-group col-md-6">
                                <label for="phone">Phone Number</label>
                                <input
                                    type="tel"
                                    class="form-control form-control-lg"
                                    name="phone"
                                    value="{{ auth()->user()->phone_number }}"
                                    placeholder="Phone Number"
                                />
                            </div>
                        </div>
            
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">New Password</label>
                                <input
                                    type="password"
                                    class="form-control form-control-lg"
                                    name="password"
                                    placeholder="New Password"
                                />
                            </div>
                    
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Confirm New Password</label>
                                <input
                                    type="password"
                                    class="form-control form-control-lg"
                                    name="password_confirmation"
                                    placeholder="Confirm New Password"
                                />
                            </div>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>                    
                </div>
            </div>
          </div>
        </section>
         


      </section>
        
    </div>
    <div style="height: 100px;"></div>
        
    <!-- /.container -->
@endsection