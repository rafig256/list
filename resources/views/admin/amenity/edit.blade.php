@extends('admin.layouts.master')

@section('title', ' Edit Amenity')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <!-- Start Icon Picker And FontAwesome -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap-iconpicker.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <!-- End Icon Picker And FontAwesome -->
@endpush
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="">
                            <form id="general-info" class="" method="POST" action="{{route('admin.amenity.update',$amenity->id)}}">
                                @csrf
                                @method("PUT")
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing section general-info">
                                    <div class="info">
                                        <h6 class="">Amenity Information</h6>
                                        <div class="row">
                                            <div class="col-lg-12 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Name <span class="text-danger">*</span></label>
                                                                            <input type="text" name="name" class="form-control mb-4" id="name" value="{{$amenity->name}}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="slug">Slug <span class="text-danger">*</span></label>
                                                                            <input type="text" name="slug" class="form-control mb-4" id="slug" value="{{$amenity->slug}}" required >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="icon">Icon <span class="text-danger">*</span></label>
                                                                            <div name="icon" data-selected-class="btn-danger" data-search-text="{{$amenity->icon}}" data-icon="{{$amenity->icon}}" data-unselected-class="btn-info" role="iconpicker"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <div>
                                                                            <div class="col-4">
                                                                                <input type="radio" class="mr-2" name="status" id="status" value="1" @checked($amenity->status == 1)><span>Active</span>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <input type="radio" class="mr-2" name="status" value="0" @checked($amenity->status == 0)><span>Inactive</span>
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

    <!-- Start Icon Picker -->
    <script src="{{asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
@endpush
