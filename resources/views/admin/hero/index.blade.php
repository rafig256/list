@extends('admin.layouts.master')

@section('title','Hero')
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
                            <form id="general-info" class="" enctype="multipart/form-data" method="POST" action="{{route('admin.hero.update')}}">
                                @csrf
                                @method('PUT')
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing section general-info">
                                    <div class="info">
                                        <h6 class="">Update Hero</h6>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-12 col-md-3">
                                                        <div class="upload mt-4 pr-md-4">
                                                            <input type="file" name="background" id="input-file-max-fs" class="dropify" data-default-file="{{@$hero->background }}" data-max-file-size="1M" />
                                                            <input type="hidden" name="old_background" value="{{@$hero->background}}">
                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload background Image</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-9 col-lg-12 col-md-9 mt-md-0 mt-4">
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="title"> Title <span class="text-danger">*</span></label>
                                                                            <input type="text" name="title" class="form-control mb-4" id="title" value="{{@$hero->title }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="sub_title">Sub Title</label>
                                                                            <textarea name="sub_title" class="form-control mb-4" id="sub_title">{{@$hero->sub_title}}</textarea>
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
