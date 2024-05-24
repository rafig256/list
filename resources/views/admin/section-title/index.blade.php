@extends('admin.layouts.master')

@section('title','update section title')
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
                            <form id="update-section-title" method="POST" action="{{route('admin.section-title.update')}}">
                                @csrf
                                @method('PUT')
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing section general-info">
                                    <div class="info">
                                        <h6 class="">Update section title and section status</h6>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto">
                                                                @foreach(config('section') as $section)
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <div class="form-group">
                                                                                <label for="{{$section}}_title"> Title for {{$section}} <span class="text-danger">*</span></label>
                                                                                <input type="text" name="{{$section}}_title" class="form-control mb-4" id="{{$section}}_title" value="{{@$sectionTitle[$section.'_title'] }}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="{{$section}}_status"> Status for {{$section}} <span class="text-danger">*</span></label>
                                                                                <input type="checkbox" name="{{$section}}_status" style="width: 100%" class=" mb-4" id="{{$section}}_status" @checked($sectionTitle[$section.'_status']) value="1" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="{{$section}}_text">SubTitle for {{$section}}</label>
                                                                                <textarea name="{{$section}}_text" class="form-control mb-4" id="{{$section}}_text">{{@$sectionTitle[$section.'_text'] }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
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
