@extends('admin.admin_master')
@section('admin')
    <section class="content">
        <div class="row">
            <div class="col-3"></div>

            <div class="col-6">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Brands </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col">
                            <form action="{{ route('brand.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $brands->id }}">
                                <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Brand Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control" id=""
                                                placeholder="" value="{{ $brands->brand_name_en }}">
                                            @error('brand_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Brand Name Kh <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_kh" class="form-control" id=""
                                                placeholder="" value="{{ $brands->brand_name_kh }}">
                                            @error('brand_name_kh')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Image<span class="text-danger">*</span></h5>
                                        <input type="file" name="brand_image" class="form-control" id="">
                                        @error('brand_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <img src="{{ asset($brands->brand_image) }}" alt="" width="85px
                                                                            ">
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="text-xs-right">
                                        {{-- <button type="submit" class="btn btn-info">Submit</button> --}}
                                        <input type="submit" value="Update" id="click" class="btn btn-rounded btn-info">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
