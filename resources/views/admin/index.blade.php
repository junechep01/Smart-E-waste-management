
@extends('admin.app')
@section('content')
    <!-- ======================= Cards ================== -->
    <div class="cardBox">
        <div class="card">
            <a href="">
                <div>
                    <div class="numbers">{{count($users)}}</div>
                    <div class="cardName">Registered Users</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>

            </a>
            
        </div>

        <div class="card">
            <a href="{">
                <div>
                    <div class="numbers">{{count($collection_requests)}}</div>
                    <div class="cardName">Collection Requests</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>

            </a>
            
        </div>

        <div class="card">
            <a href="">
                <div>
                    <div class="numbers">{{count($emails)}}</div>
                    <div class="cardName">Emails</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div>
            </a>
        </div>

        <div class="card">
            <a href="">
                <div>
                    <div class="numbers">0</div>
                    <div class="cardName">Blogs</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </a>
        </div>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Recent Collection   Requests</h2>
                <a href="{" class="btn">View All</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Message</td>
                        <td>Phone Number</td>
                        <td>Date</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($collection_requests as $request)
                        <tr>
                            <td>{{$request->user->name}}</td>
                            <td>{{$request->message}}</td>
                            <td>{{$request->user->phone_number}}</td>
                            <td><span class="status delivered">{{ $request->created_at->diffForHumans() }}</span></td>

                        </tr>
                    @endforeach               
                </tbody>
            </table>
        </div>

        <!-- ================= New Customers ================ -->
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Recent Registered Users</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Date Registered</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td><span class="status delivered">{{ $user->created_at->diffForHumans() }}</span></td>
                        </tr>
                    @endforeach               
                </tbody>
            </table>
        </div>
    </div>

@endsection