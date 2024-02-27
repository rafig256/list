@extends('frontend.layouts.master')
@section('title','Profile')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/dropify/dropify.min.css')}}">
    <link href="{{asset('admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endpush

@section('content')
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <h4>basic information</h4>
                            <form name="changeProfile" method="POST" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_type" value="{{auth()->user()->user_type}}">
                                <div class="row">
                                    <div class="col-xl-8 col-md-12">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label for="name">Name<span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input id="name" name="name" type="text" placeholder="Name" required value="{{$user->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label for="phone">phone</label>
                                                    <div class="input_area">
                                                        <input name="phone" id="phone" type="text" value="{{$user->phone}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label for="email">email<span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input name="email" id="email" type="Email" placeholder="Email" value="{{$user->email}}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label for="address">Address</label>
                                                    <div class="input_area">
                                                        <input name="address" id="address" type="text" placeholder="address" value="{{$user->address}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label for="about">About Me</label>
                                                    <div class="input_area">
                                                        <textarea name="about" id="about" cols="3" rows="3" placeholder="Your Text">{{$user->about}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-5">
                                            <div class="upload mt-4 pr-md-4">
                                                <input type="file" name="avatar" id="input-file-max-fs" class="dropify" data-default-file="{{asset(auth()->user()->avatar)}}" data-max-file-size="1M" />
                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Avatar</p>
                                            </div>

                                            <div class="upload mt-4 pr-md-4">
                                                <input type="file" name="banner" id="input-file-max-fs" class="dropify" data-default-file="{{auth()->user()->banner ? asset(auth()->user()->banner) : asset('admin/assets/img/200x200.jpg')}}" data-max-file-size="2M" />
                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Banner</p>
                                            </div>
                                    </div>
                                </div>
                                <div id="medicine_row3">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6">
                                            <label for="fb_link">FaceBook</label>
                                            <div class="medicine_row_input">
                                                <input type="text" name="fb_link" id="fb_link" value="{{$user->fb_link}}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <label for="in_link">linkedIn</label>
                                            <div class="medicine_row_input">
                                                <input type="text" name="in_link" id="in_link" value="{{$user->in_link}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="medicine_row3">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6">
                                            <label for="wa_link">Whats up</label>
                                            <div class="medicine_row_input">
                                                <input type="text" name="wa_link" id="wa_link" value="{{$user->wa_link}}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <label for="instagram_link">Instagram</label>
                                            <div class="medicine_row_input">
                                                <input type="text" name="instagram_link" id="instagram_link" value="{{$user->instagram_link}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="medicine_row3">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6">
                                            <label for="x_link">Tweeter (X)</label>
                                            <div class="medicine_row_input">
                                                <input type="text" name="x_link" id="x_link" value="{{$user->x_link}}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <label for="website">WebSite</label>
                                            <div class="medicine_row_input">
                                                <input type="text" name="website" id="website" value="{{$user->website}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="read_btn">submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="my_listing list_mar">
                            <h4>change password</h4>
                            <form method="post" action="{{route('user.profile.password')}}" name="changPassword" id="changPassword">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="my_listing_single">
                                            <label for="password">new password <span class="text-danger">*</span></label>
                                            <div class="input_area">
                                                <input type="password" name="password" id="website" placeholder="New Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="my_listing_single">
                                            <label for="password_confirmation">confirm password <span class="text-danger">*</span> </label>
                                            <div class="input_area">
                                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="read_btn">update password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script src="{{asset('admin/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('admin/plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{asset('admin/assets/js/users/account-settings.js')}}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
@endpush
