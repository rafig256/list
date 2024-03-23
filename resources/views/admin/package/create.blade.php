@extends('admin.layouts.master')

@section('title', ' Create Package')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
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
                            <form id="create-package" class="" method="POST" action="{{route('admin.package.store')}}">
                                @csrf
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing section general-info">
                                    <div class="info">
                                        <h6 class="">Package Information <span class="text-danger">(For Ultimated Quantity Use -1)</span></h6>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="name">Package Name <span class="text-danger">*</span></label>
                                                                            <input type="text" name="name" class="form-control mb-4" id="name"  required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="type">Type <span class="text-danger">*</span></label>
                                                                            <select name="type" id="type" class="form-control mb-4" required>
                                                                                <option value="free">Free</option>
                                                                                <option value="paid">Paid</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="price">Price <span class="text-danger">*</span></label>
                                                                            <input type="number" name="price" class="form-control mb-4" id="price" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="num_of_days">Number of days <span class="text-danger">*</span></label>
                                                                            <input type="number" name="num_of_days" class="form-control mb-4" id="num_of_days" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="num_of_listings">Number of Listings <span class="text-danger">*</span></label>
                                                                            <input type="number" name="num_of_listings" class="form-control mb-4" id="num_of_listings" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="num_of_photos">Number of Photos <span class="text-danger">*</span></label>
                                                                            <input type="number" name="num_of_photos" class="form-control mb-4" id="num_of_photos" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="num_of_amenities">Number of Amenities <span class="text-danger">*</span></label>
                                                                            <input type="number" name="num_of_amenities" class="form-control mb-4" id="num_of_amenities" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="num_of_featured_listings">Number of Featured Listings <span class="text-danger">*</span></label>
                                                                            <input type="number" name="num_of_featured_listings" class="form-control mb-4" id="num_of_featured_listings" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <div>
                                                                                <div class="col-4">
                                                                                    <input type="radio" class="mr-2" name="status" id="status" value="1" checked><span>Active</span>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <input type="radio" class="mr-2" name="status" id="status" value="0"><span>Inactive</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="show_at_home">Show At Home</label>
                                                                            <input type="checkbox" name="show_at_home" id="show_at_home" value="1">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="input-group social-tweet mb-3">
                                                                            <button class="btn btn-success" type="submit">Create</button>
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
    <script src="{{asset('admin/plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{asset('admin/assets/js/users/account-settings.js')}}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
@endpush
