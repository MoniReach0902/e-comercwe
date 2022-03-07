@extends('admin.admin_master')
@section('admin')
    <section class="content">
        <div class="row">
            <div class="col-8">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Brands List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Brand En</th>
                                        <th>Brand Kh</th>
                                        <th>Images</th>
                                        <th>Action </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td>{{ $brand->brand_name_en }}</td>
                                            <td>{{ $brand->brand_name_kh }}</td>
                                            <td><img src="{{ asset($brand->brand_image) }}" alt=""
                                                    style="width: 70px;height: 40px;"></td>
                                            <td>
                                                <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-info"
                                                    id="edit">Edit</a>
                                                <a href="{{ route('brand.delete', $brand->id) }}" class="btn btn-danger"
                                                    id="delete">Delete </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Brand En</th>
                                        <th>Brand Kh</th>
                                        <th>Images</th>
                                        <th>Action </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->

                <!-- /.box -->
            </div>
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Brands </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col">
                            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Brand Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control" id=""
                                                placeholder="">
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
                                                placeholder="">
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
                                    <div class="text-xs-right">
                                        {{-- <button type="submit" class="btn btn-info">Submit</button> --}}
                                        <input type="submit" value="Submit" id="click" class="btn btn-rounded btn-info">
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
