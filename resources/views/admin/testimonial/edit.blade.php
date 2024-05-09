@extends('admin.layouts.master')

@section('title', ' Edit Testimonial')

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing bg-white">
            <div class="account-settings-container layout-top-spacing" style="padding: 40px">
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="">
                            <form id="update-testimonial" enctype="multipart/form-data" method="POST" action="{{route('admin.testimonial.update', $testimonial->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing section general-info">
                                    <div class="info">
                                        <h6 class="">Testimonial Information</h6>
                                        <div class="row">
                                            <div class="col-lg-12 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-8 mt-md-0">
                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name">Name <span class="text-danger">*</span></label>
                                                                    <input type="text" name="name" class="form-control mb-4" id="name" value="{{$testimonial->name}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="role">Role <span class="text-danger">*</span></label>
                                                                    <input type="text" name="role" class="form-control mb-4" id="role" value="{{$testimonial->role}}" required >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="image">Image <span class="text-danger">*</span></label>
                                                                    <input type="file" name="image" id="image" class="form-control mb-4">
                                                                    </div>
                                                                </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="rating">Rating <span class="text-danger">*</span></label>
                                                                    <input type="number" name="rating" class="form-control mb-4" id="rating" min="1" max="10" value="{{$testimonial->rating}}" required >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="description">Description</label>
                                                                    <textarea name="description" class="form-control" id="description">{{$testimonial->description}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="status">Status</label>
                                                                    <div>
                                                                        <div class="col-4">
                                                                            <input type="radio" class="mr-2" name="status" id="status" value="1" @checked($testimonial->status == 1)><span>Active</span>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <input type="radio" class="mr-2" name="status" value="0" @checked($testimonial->status == 0)><span>Inactive</span>
                                                                        </div>
                                                                    </div>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

