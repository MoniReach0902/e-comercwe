@extends('admin.admin_master')
@section('admin')
    <section class="content">
        <div class="row">
            <div class="col-3"></div>

            <div class="col-6">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col">
                            <form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $category->id }}">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Brand Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en" class="form-control" id=""
                                                placeholder="" value="{{ $category->category_name_en }}">
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
                                            <input type="text" name="category_name_kh" class="form-control" id=""
                                                placeholder="" value="{{ $category->category_name_kh }}">
                                            @error('brand_name_kh')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Category Icon <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" class="form-control" id=""
                                                placeholder="" value="{{ $category->category_icon }}">
                                            @error('brand_name_kh')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5> Icon <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <i class="{{ $category->category_icon }}" style="font-size: 30px"></i>

                                        </div>
                                    </div>
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
