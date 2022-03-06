@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Profile Edit</h4>

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('update.change.password') }}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="old_passwords" class="form-control"
                                            id="current_password" placeholder="Current Passwords">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>New Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="New Password">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Confrom Password <span class="text-danger">*</span></h5>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="password_confirmation" placeholder="Confirm Password">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="text-xs-right">
                                        {{-- <button type="submit" class="btn btn-info">Submit</button> --}}
                                        <input type="submit" value="Update" id="click" class="btn btn-rounded btn-info">
                                    </div>

                                </div>
                            </div>




                        </form>
                    </div>

                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div>
    <!-- /.box-body -->

    <!-- /.box -->


    </section>
    <!-- /.content -->
    </div>
@endsection
