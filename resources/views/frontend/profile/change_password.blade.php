@extends('frontend.main_master')
@section('content')
    {{-- @php
    $user = DB::table('users')
        ->where('id', Auth::user()->id)
        ->first();
    @endphp --}}
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
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change
                            password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">
                                Hi....{{ Auth::user()->name }}
                                <strong>Update Your Profile </strong>
                            </span>
                        </h3>
                        <div class="card-body">
                            <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="basic_checkbox_1">Currenr Password</label>
                                    <input type="password" id="current_password" name="old_password"
                                        class="form-control pl-15 bg-transparent text-white plc-white"
                                        placeholder="Username ">
                                </div>
                                <div class="form-group">
                                    <label for=""> Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control pl-15 bg-transparent text-white plc-white"
                                        placeholderßUsername">
                                </div>
                                <div class="form-group">
                                    <label for="basic_checkbox_1">New Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Phone">
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
