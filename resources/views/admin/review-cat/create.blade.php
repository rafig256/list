@extends('admin.layouts.master')

@section('title', ' Create Review Category')
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
                            <form id="general-info" class="" enctype="multipart/form-data" method="POST" action="{{route('admin.review-cat.store')}}">
                                @csrf
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing section general-info">
                                    <div class="info">
                                        <h6 class="">Review Category Information</h6>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="name">Name <span class="text-danger">*</span></label>
                                                                            <input type="text" name="name" class="form-control mb-4" id="name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
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
    <script src="{{asset('admin/assets/js/users/account-settings.js')}}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
@endpush
