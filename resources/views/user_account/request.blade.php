@extends('layouts.app') 
@section('content')  
	<!-- full Title -->
  <div style="height: 70px;"></div>

  


    <!-- Page Content -->
    <div class="container" >

        <h3 class="my-4 text-center">Make A Collection Request</h3>
      <section class="contact spad mb-4"  style="background-color: #f5f5f5;">
        <section class="contact spad mb-4"  style="background-color: #f5f5f5;">
            <div class="container">
                    <div class="row pl-4">
              <!-- Sidebar navigation -->
              <div class="col-md-3 dashboard-menu">
               <div class="list-group text-center">
                    <a href="{{ route('user.dashboard') }}" class="list-group-item  list-group-item-action mb-2">Dashboard</a>
                    <a href="{{ route('user.request') }}" class="list-group-item active list-group-item-action mb-2">Make Collect Request</a>
                    <a href="{{ route('user.orders') }}" class="list-group-item list-group-item-action mb-2">My Ewaste Collections</a>
                    <a href="{{ route('account.details') }}" class="list-group-item list-group-item-action  mb-2">Account Details</a>
                    <a href="{{ route('user.update') }}" class="list-group-item  list-group-item-action mb-2">Update Account</a>
                    <a href="{{ route('user.logout') }}" class="list-group-item list-group-item-action mb-2">Log Out</a>
                    <!-- More links -->
                </div>
              </div>
              <!-- Main content -->
              <div class="col-md-9 pl-3">
                
              <form action="{{ route('requests.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(session('success'))
                        <div class="alert alert-success mb-2 mt-2" role="alert">
                            {{ session('success') }}
                        </div>
                        <br>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger mb-2 mt-2" role="alert">
                            Please fix the following errors:
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <div class="form-row">
                    

                    <div class="form-group col-md-6">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control form-control-lg" name="name" value="{{ auth()->user()->name }}" placeholder="Name" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <input type="text" class="form-control form-control-lg" name="address" placeholder="Address" value="{{ auth()->user()->address }}" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" value="{{ auth()->user()->email }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control form-control-lg" name="phone_number" placeholder="Phone Number" value="{{ auth()->user()->phone_number }}" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date">Date</label>
                        <input type="date" class="form-control form-control-lg" name="date" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="time">Time</label>
                        <input type="time" class="form-control form-control-lg" name="time" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control form-control-lg" name="message" rows="4"></textarea>
                </div>
                

                <div class="form-group">
                    <label for="image">Upload Image</label>
                    <input type="file" class="form-control form-control-lg" name="image" accept="image/*" required />
                </div>


                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary btn-lg">Make Request</button>
                </div>
            </form>
            </div>
                </div>
            </div>
          </div>
        </section>
         


      </section>
        
    </div>
    <div style="height: 100px;"></div>
        
    <!-- /.container -->
@endsection