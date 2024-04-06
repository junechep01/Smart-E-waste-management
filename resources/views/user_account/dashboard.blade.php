@extends('layouts.app') 
@section('content')  
	<!-- full Title -->
  <div style="height: 100px;"></div>

  


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
                    <a href="{{ route('user.dashboard') }}" class="list-group-item active list-group-item-action mb-2">Dashboard</a>
                    <a href="{{ route('user.request') }}" class="list-group-item list-group-item-action mb-2">Collect Request</a>
                    <a href="{{ route('user.orders') }}" class="list-group-item list-group-item-action mb-2">My Ewaste Collections</a>
                    <a href="{{ route('account.details') }}" class="list-group-item list-group-item-action  mb-2">Account Details</a>
                    <a href="{{ route('user.update') }}" class="list-group-item  list-group-item-action mb-2">Update Account</a>
                    <a href="{{ route('user.logout') }}" class="list-group-item list-group-item-action mb-2">Log Out</a>
                    <!-- More links -->
                </div>
              </div>
              <!-- Main content -->
              <div class="col-md-9 pl-3">
                <p><strong>Hello {{ auth()->user()->name }}</strong>   <br>  <br>
        
                    From your account dashboard you can view your previous e-waste collectionc, manage your addresses, and edit your password and account details.</p>
                <!-- Content goes here -->
              </div>
            </div>
          </div>
        </section>
      </section> 
    </div>
    <div style="height: 100px;"></div>
@endsection