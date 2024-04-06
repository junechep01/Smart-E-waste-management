@extends('layouts.app') 
@section('content')  
	<!-- full Title -->
  <div style="height: 30px;"></div>

  


    <!-- Page Content -->
    <div class="container" >

    <h3 class="my-4 text-center">My Collection History</h3>
    <section class="contact spad mb-4"  style="background-color: #f5f5f5;">
    <section class="contact spad mb-4"  style="background-color: #f5f5f5;">
        <div class="container">
                <div class="row pl-4">
          <!-- Sidebar navigation -->
          <div class="col-md-3 dashboard-menu">
          <div class="list-group text-center">
                <a href="{{ route('user.dashboard') }}" class="list-group-item  list-group-item-action mb-2">Dashboard</a>
                <a href="{{ route('user.request') }}" class="list-group-item  list-group-item-action mb-2">Make Collect Request</a>
                <a href="{{ route('user.orders') }}" class="list-group-item active list-group-item-action mb-2">My Ewaste Collections</a>
                <a href="{{ route('account.details') }}" class="list-group-item list-group-item-action  mb-2">Account Details</a>
                <a href="{{ route('user.update') }}" class="list-group-item  list-group-item-action mb-2">Update Account</a>
                <a href="{{ route('user.logout') }}" class="list-group-item list-group-item-action mb-2">Log Out</a>
                <!-- More links -->
            </div>
          </div>
               <!-- Main content -->
            <div class="col-md-9 p-3">
            @if(auth()->user()->requests->isEmpty())
    <div class="card p-2 text-center" style="border: 2px solid #7fad39;">
        <div class="row mt-2">
            <div class="col">
                <p>No previous e-waste collections</p>
            </div>
            <div class="col">
                <a class="link" href="{{ route('user.request')}}">MAKE E-WASTE COLLECTION REQUEST</a>
            </div>
        </div>
    </div>
@else
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Message</th>
                <th>Points</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach(auth()->user()->requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->date }}</td>
                    <td>{{ $request->time }}</td>
                    <td>
                    {{ $request->message }}
                       
                    </td>
                    <td>{{$request->points}}</td>
                    <td>
                      <span class="badge badge-warning">{{ $request->status }}</span>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endif

            </div>
          </div>
        </section>
         


      </section>
        
    </div>
        
    <!-- /.container -->
@endsection