@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <section class="content">
        <div class="row">
            <div class="col-8">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Sub SubCategorys List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category </th>
                                        <th>Sub Category </th>
                                        <th>Sub Sub Category En</th>
                                        <th>Sub Sub Categorynd Kh</th>
                                        <th>Action </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subsubcategory as $item)
                                        <tr>
                                            <td>{{ $item['category']['category_name_en'] }}</td>
                                            <td>{{ $item['subcategory']['subcategory_name_en'] }}</td>
                                            <td>{{ $item->subsubcategory_name_en }}</td>
                                            <td>{{ $item->subsubcategory_name_kh }}</td>
                                            <td>
                                                <a href="{{ route('subcategory.edit', $item->id) }}" class="btn btn-info"
                                                    id="edit">Edit <i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ route('subcategory.delete', $item->id) }}"
                                                    class="btn btn-danger" id="delete">Delete <i
                                                        class="fa-solid fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Category </th>
                                        <th>Sub Category </th>
                                        <th>Sub Sub Category En</th>
                                        <th>Sub Sub Categorynd Kh</th>
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
                        <h3 class="box-title">Add Sub Sub Category </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col">
                            <form action="{{ route('subcategory.store') }}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5> Category Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" id="" class="form-control">
                                                <option value="" selected="" disabled="">Select Category</option>
                                                @foreach ($category as $data)
                                                    <option value="{{ $data->id }}">{{ $data->category_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Sub Category Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" id="" class="form-control">
                                                <option value="" selected="" disabled="">Select Category</option>
                                                {{-- @foreach ($subcategory as $data)
                                                    <option value="{{ $data->id }}">{{ $data->subcategory_name_en }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                            @error('subcategory_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Sub Sub Category Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_en" class="form-control" id=""
                                                placeholder="">
                                            @error('subcategory_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Sub Sub Category Name Kh <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_kh" class="form-control" id=""
                                                placeholder="">
                                            @error('subsubcategory_name_kh')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
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
    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
