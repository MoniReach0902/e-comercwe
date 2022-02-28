@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ !empty($editData->profile_photo_path)? url('upload/admin_images/' . $editData->profile_photo_path): url('uploads/no-images.jpg') }}"
                        alt="" class="card-img-top" style="border-radius: 50%" height="100%" width="100%">
                    <br><br>
                    <ul class="list-group list-group-flush">
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="" class="btn btn-primary btn-sm btn-block">Change password</a>
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
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="basic_checkbox_1">Name</label>
                                    <input type="text" id="email" name="name"
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
                                    <input type="text" id="email" name="phone"
                                        class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Phone">
                                </div>
                                <div class="form-group">

                                </div>
                                <button type="submit">

                                    </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
