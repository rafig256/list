@extends('admin.layouts.master')

@section('title', ' Edit Category')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/dropify/dropify.min.css')}}">
    <link href="{{asset('admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endpush
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="">
                            <form id="general-info" class="" enctype="multipart/form-data" method="POST" action="{{route('admin.category.update',$category->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing section general-info">
                                    <div class="info">
                                        <h6 class="">Category Information</h6>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                                        <div class="upload mt-4 pr-md-4">
                                                            <input type="file" name="image_icon" id="input-file-max-fs" class="dropify" data-default-file="{{asset($category->image_icon)}}" data-max-file-size="1M" />
                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Icon</p>
                                                        </div>

                                                        <div class="upload mt-4 pr-md-4">
                                                            <input type="file" name="background_image" id="input-file-max-fs" class="dropify" data-default-file="{{asset($category->background_image)}}" data-max-file-size="2M" />
                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Background</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Name <span class="text-danger">*</span></label>
                                                                            <input type="text" name="name" class="form-control mb-4" id="name" value="{{$category->name}}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="slug">Slug <span class="text-danger">*</span></label>
                                                                            <input type="text" name="slug" class="form-control mb-4" id="slug" value="{{$category->slug}}" required >
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="price">Price <span class="text-danger">*</span></label>
                                                                            <input type="text" name="price" class="form-control mb-4" id="price" value="{{$category->price}}" required >
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="parent_id">Parent Category <span class="text-danger">*</span></label>
                                                                        <select name="parent_id" id="parent_id" class="form-control">
                                                                            <option value="">It is parent Category</option>
                                                                            @foreach($categories as $row)
                                                                                <option value="{{$row->id}}" @selected($category->parent_id === $row->id)>{{$row->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        </div>
                                                                    </div>
@if($category->parent_id !== NULL)
                                                                        <div class="col-md-12">
                                                                            <label for="review_cats_id">Review Category</label>
                                                                            <div class="form-group row">
                                                                                @foreach($review_cats as $review_category)
                                                                                    <div class="col-3">
                                                                                        <input type="checkbox" name="review_cats_id[]" @checked($category->review_cats->contains($review_category->id)) value="{{$review_category->id}}"> {{$review_category->name}}
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
@endif

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <div>
                                                                                <div class="col-4">
                                                                                    <input type="radio" class="mr-2" name="status" id="status" value="1" @checked($category->status)><span>Active</span>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <input type="radio" class="mr-2" name="status" id="status" value="0" @checked($category->status == 0 )><span>Inactive</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="show_at_home">Show At Home</label>
                                                                            <input type="checkbox" name="show_at_home" id="show_at_home" @checked($category->show_at_home) value="1">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="input-group social-tweet mb-3">
                                                                            <button class="btn btn-success" type="submit">Update</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script src="{{asset('admin/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('admin/plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{asset('admin/assets/js/users/account-settings.js')}}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
@endpush
