@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ !empty($user->profile_photo_path)? url('uploads/user_images/' . $user->profile_photo_path): url('uploads/no-images.jpg') }}"
                        alt="" class="card-img-top" style="border-radius: 50%" height="100%" width="100%">
                    <br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">
                            Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">
                                Hi....{{ Auth::user()->name }}
                                <strong>Change Password</strong>
                            </span>
                        </h3>
                        <div class="card-body">
                            <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="basic_checkbox_1">Name</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control pl-15 bg-transparent text-white plc-white"
                                        placeholder="Username " value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" id="email" name="email"
                                        class="form-control pl-15 bg-transparent text-white plc-white" placeholderßUsername"
                                        value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="basic_checkbox_1">Phone</label>
                                    <input type="text" id="phone" name="phone"
                                        class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Phone"
                                        value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="basic_checkbox_1">User Profile</label>
                                    <input type="file" name="profile_photo_path" id="" class="form-control">
                                </div>
                                <div class="from-gorup">
                                    <button type="submit" class="btn btn-info"> update </button>
                                </div>

                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
