@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <h3 class="page-title">Add Product</h3>
        </div>
        <!-- Main content -->
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form novalidate>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Brand Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" id="" class="form-control">
                                                            <option value="">Select brand</option>
                                                            @foreach ($brands as $data)
                                                                <option value="{{ $data->id }}">
                                                                    {{ $data->brand_name_en }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <h5> Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" id="" class="form-control">
                                                            <option value="">Select Category
                                                            </option>
                                                            @foreach ($categorys as $data)
                                                                <option value="{{ $data->id }}">
                                                                    {{ $data->category_name_en }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <h5> SubCategory Select<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" id="" class="form-control">
                                                            <option value="">Select SubCategory
                                                            </option>
                                                        </select>
                                                        @error('subcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- 2 row --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Sub SubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" id="" class="form-control">
                                                            <option value="">Select Sub Sub Category</option>

                                                        </select>
                                                        @error('subsubcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product name en <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_en" class="form-control"
                                                            required
                                                            data-validation-required-message="This field is required">
                                                        @error('product_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product name kh <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_kh" class="form-control"
                                                            required
                                                            data-validation-required-message="This field is required">
                                                        @error('product_name_kh')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Email Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>File Input Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="file" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Textarea <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Checkbox <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="checkbox" id="checkbox_1" required value="single">
                                                <label for="checkbox_1">Check this custom checkbox</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Checkbox Group <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" required value="x">
                                                    <label for="checkbox_2">I am unchecked Checkbox</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" value="y">
                                                    <label for="checkbox_3">I am unchecked too</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Select Max 2 Checkbox<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4"
                                                        data-validation-maxchecked-maxchecked="2"
                                                        data-validation-maxchecked-message="Don't be greedy!" required>
                                                    <label for="checkbox_4">I am unchecked Checkbox</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5">
                                                    <label for="checkbox_5">I am unchecked too</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_6">
                                                    <label for="checkbox_6">You can check me</label>
                                                </fieldset>
                                            </div> <small>Select any 2 options</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Minimum 2 Checkbox selection<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_7" value="1"
                                                        data-validation-minchecked-minchecked="2"
                                                        data-validation-minchecked-message="Choose at least two"
                                                        name="styled_min_checkbox" required>
                                                    <label for="checkbox_7">I am unchecked Checkbox</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_8" value="2">
                                                    <label for="checkbox_8">I am unchecked too</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_9" value="3">
                                                    <label for="checkbox_9">You can check me</label>
                                                </fieldset>
                                            </div> <small>Select any 2 options</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Radio Buttons <span class="text-danger">*</span></h5>
                                            <fieldset class="controls">
                                                <input name="group1" type="radio" id="radio_1" value="1" required>
                                                <label for="radio_1">Check Me</label>
                                            </fieldset>
                                            <fieldset>
                                                <input name="group1" type="radio" id="radio_2" value="2">
                                                <label for="radio_2">Or Me</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Inline Radio Buttons <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <fieldset>
                                                    <input name="group2" type="radio" id="radio_3" value="Yes" required>
                                                    <label for="radio_3">Check Me</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input name="group2" type="radio" id="radio_4" value="No">
                                                    <label for="radio_4">Or Me</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    {{-- <button type="submit" class="btn btn-info">Submit</button> --}}
                                    <input type="submit" value="Add product" id="click" class="btn btn-rounded btn-info">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
