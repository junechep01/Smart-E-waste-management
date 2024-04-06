@extends('admin.app')
@section('content')
    <div class="card shadow-lg mx-4 ">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/img/camera-drone.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->firstname ?? 'Firstname' }} {{ auth()->user()->lastname ?? 'Lastname' }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            @if(auth()->user()->role==1)
                                Super Admin
                            @elseif(auth()->user()->role==2)
                                Admin
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <form role="form" method="POST" action={{ route('profile.update') }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">First name</label>
                                        <input class="form-control" type="text" name="firstname"  value="{{ old('firstname', auth()->user()->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Date Created</label>
                                        <input class="form-control" type="text" name="lastname" disabled value="{{ old('lastname', auth()->user()->created_at) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Phone</label>
                                        <input class="form-control" type="text" name="phone" value="{{ old('phone', auth()->user()->phone_number) }}">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Designation</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Role</label>
                                        <select class="form-control" name="role" @if(auth()->user()->role != 1) disabled @endif>
                                            <option value="1" {{ auth()->user()->role == 1 ? 'selected' : '' }}>Super Admin</option>
                                            <option value="2" {{ auth()->user()->role == 2 ? 'selected' : '' }}>Admin</option>
                                          
                                        </select>
                                        @if(auth()->user()->role != 1)
                                            <small class="text-danger">You are not allowed to change your role.</small>
                                            <input type="hidden" name="role" value="{{ auth()->user()->role }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            </form>
                            <form role="form" method="POST" action={{ route('password.update') }} enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                            <hr class="horizontal dark">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Password Settings</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Update</button>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Old Password</label>
                                        <input class="form-control" type="password" name="old-password">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">New Password</label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Confirm Password</label>
                                        <input class="form-control" type="password" name="confirm-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
