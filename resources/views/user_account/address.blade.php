@extends('web.app')
@section('title', 'Contact')    
@section('content')
  
<section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Categories</span>
                        </div>
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="#">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact spad mb-4"  style="background-color: #f5f5f5;">
    <div class="container">
            <div class="row pl-4">
      <!-- Sidebar navigation -->
      <div class="col-md-3 dashboard-menu">
        <div class="list-group text-center">
            <a href="{{ route('user.dashboard') }}" class="list-group-item  list-group-item-action mb-2">Dashboard</a>
            <a href="{{ route('user.request') }}" class="list-group-item list-group-item-action mb-2">Collect Request</a>
            <a href="{{ route('user.orders') }}" class="list-group-item list-group-item-action mb-2">My Ewaste Collections</a>
            <a href="{{ route('user.address') }}" class="list-group-item  active list-group-item-action mb-2">Address</a>
            <a href="{{ route('account.details') }}" class="list-group-item list-group-item-action  mb-2">Account Details</a>
            <a href="{{ route('user.logout') }}" class="list-group-item list-group-item-action mb-2">Log Out</a>
            <!-- More links -->
        </div>
      </div>
      <!-- Main content -->
      <div class="col-md-9 pl-3">
        <div class="row ml-3">
            <h4 class="mb-2">  Shipping Address </h4>  <br>  
                <div class="col-sm-12">
                    
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price">First Name*</label>
                            <input
                                type="text"
                                class="form-control form-control-lg"
                                name="price"
                                placeholder="First Name"
                            />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="quantity">Last Name</label>
                            <input
                                type="text"
                                class="form-control form-control-lg"
                                name="quantity"
                                placeholder="Last Name"
                            />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price"> County</label>
                            <input
                                type="text"
                                class="form-control form-control-lg"
                                name="price"
                                placeholder="County"
                            />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="quantity">Sub-County</label>
                            <input
                                type="text"
                                class="form-control form-control-lg"
                                name="quantity"
                                placeholder="Sub County"
                            />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price"> Ward</label>
                            <input
                                type="text"
                                class="form-control form-control-lg"
                                name="price"
                                placeholder="Ward"
                            />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="quantity">Location</label>
                            <input
                                type="text"
                                class="form-control form-control-lg"
                                name="quantity"
                                placeholder="Location"
                            />
                        </div>
                    </div>
                    <button class="btn btn-primary text-dark" href="{{ route('products')}}">BROWSE PRODUCTS</button>
                    
                
                </div>
            </div>
        </div>
    </div>
</div>
     
</section>
 




@endsection