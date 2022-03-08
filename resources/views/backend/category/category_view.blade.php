@extends('admin.admin_master')
@section('admin')
    <section class="content">
        <div class="row">
            <div class="col-8">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Categorys List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Brand En</th>
                                        <th>Brand Kh</th>
                                        <th>Icon</th>
                                        <th>Action </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $item)
                                        <tr>
                                            <td>{{ $item->category_name_en }}</td>
                                            <td>{{ $item->category_name_kh }}</td>
                                            <td><i class="{{ $item->category_icon }}" style="font-size: 30px"></i> </td>
                                            {{-- <td><img src="{{ asset($item->_icon) }}" alt=""
                                                    style="width: 70px;height: 40px;"></td> --}}
                                            <td>
                                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-info"
                                                    id="edit">Edit</a>
                                                <a href="{{ route('category.delete', $item->id) }}" class="btn btn-danger"
                                                    id="delete">Delete </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Brand En</th>
                                        <th>Brand Kh</th>
                                        <th>Icon</th>
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
                        <h3 class="box-title">Add Category </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col">
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Category Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en" class="form-control" id=""
                                                placeholder="">
                                            @error('category_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Category Name Kh <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_kh" class="form-control" id=""
                                                placeholder="">
                                            @error('category_name_kh')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Icon<span class="text-danger">*</span></h5>
                                        <input type="text" name="category_icon" class="form-control" id="">
                                        @error('category_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Image<span class="text-danger">*</span></h5>
                                        <input type="file" name="brand_image" class="form-control" id="">
                                        @error('brand_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
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
