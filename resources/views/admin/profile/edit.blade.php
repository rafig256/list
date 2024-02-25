@extends('admin.layouts.master')

@section('title','edit Profile')

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
                        <div class="row">
                            <form id="general-info" class="" enctype="multipart/form-data" method="POST" action="{{route('admin.profile.update')}}">
                                @csrf
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing section general-info">
                                        <div class="info">
                                            <h6 class="">General Information</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                                            <div class="upload mt-4 pr-md-4">
                                                                <input type="file" name="avatar" id="input-file-max-fs" class="dropify" data-default-file="{{asset(auth()->user()->avatar)}}" data-max-file-size="1M" />
                                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Avatar</p>
                                                            </div>

                                                            <div class="upload mt-4 pr-md-4">
                                                                <input type="file" name="banner" id="input-file-max-fs" class="dropify" data-default-file="{{auth()->user()->banner ? asset(auth()->user()->banner) : asset('admin/assets/img/200x200.jpg')}}" data-max-file-size="2M" />
                                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Banner</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="row">
                                                                <div class="col-md-11 mx-auto">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="name">Full Name <span class="text-danger">*</span></label>
                                                                                <input type="text" name="name" class="form-control mb-4" id="name" value="{{auth()->user()->name}}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="address">Address</label>
                                                                                <input type="text" name="address" class="form-control mb-4" id="address" value="{{auth()->user()->address}}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="website">Web Site</label>
                                                                                <input type="text" name="website" class="form-control mb-4" id="website" value="{{auth()->user()->website}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="phone">Phone</label>
                                                                                <input type="text" name="phone" class="form-control mb-4" id="phone" value="{{auth()->user()->phone}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="email">Email <span class="text-danger">*</span></label>
                                                                                <input type="text" name="email" class="form-control mb-4" id="email" value="{{auth()->user()->email}}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="user_type">User Type</label>
                                                                                <select name="user_type" class="form-control" id="user_type">
                                                                                    <option value="admin" @selected(auth()->user()->user_type == 'admin' ) >Admin</option>
                                                                                    <option value="user" @selected(auth()->user()->user_type == 'user' ) >user</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="about">About</label>
                                                                                <textarea class="form-control" name="about" id="about">{{auth()->user()->about ?? ""}}</textarea>
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
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing section general-info mt-3">
                                    <div class="info">
                                        <h5 class="">Social</h5>
                                        <div class="row">
                                            <div class="col-md-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group social-linkedin mb-3">
                                                            <div class="input-group-prepend mr-3">
                                                                <span class="input-group-text" id="linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></span>
                                                            </div>
                                                            <input type="text" name="in_link" class="form-control" placeholder="linkedin Username" aria-label="linked In Username" aria-describedby="linkedin" value="{{auth()->user()->in_link}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group social-tweet mb-3">
                                                            <div class="input-group-prepend mr-3">
                                                                <span class="input-group-text" id="tweet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></span>
                                                            </div>
                                                            <input type="text" name="x_link" class="form-control" placeholder="Twitter Username" aria-label="X Username" aria-describedby="tweet" value="{{auth()->user()->x_link}}">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group social-fb mb-3">
                                                            <div class="input-group-prepend mr-3">
                                                                <span class="input-group-text" id="fb"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></span>
                                                            </div>
                                                            <input type="text" name="fb_link" class="form-control" placeholder="Facebook Username" aria-label="Username" aria-describedby="fb" value="{{auth()->user()->fb_link}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group social-github mb-3">
                                                            <div class="input-group-prepend mr-3">
                                                                <span class="input-group-text" id="github">
                                                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="wa_link" class="form-control" placeholder="Whats up Username" aria-label="Username" aria-describedby="whats up" value="{{auth()->user()->wa_link}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group social-github mb-3">
                                                            <div class="input-group-prepend mr-3">
                                                                <span class="input-group-text" id="github">
                                                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="instagram_link" class="form-control" placeholder="instagram Username" aria-label="instagram Username" aria-describedby="instagram" value="{{auth()->user()->instagram_link}}">
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
