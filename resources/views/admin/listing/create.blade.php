@extends('admin.layouts.master')

@section('title','create listing')

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/dropify/dropify.min.css')}}">
    <link href="{{asset('admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <!--- SELECT2 -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/select2/select2.min.css')}}">

@endpush
@section('content')
    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <form id="listing" action="{{route('admin.listing.store')}}" enctype="multipart/form-data" method="POST" class="">
                    @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="section social">
                                <div class="info">
                                    <h5 class="">General Listing Information</h5>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" name="image" id="input-file-max-fs" class="dropify" data-default-file="{{asset('default/default_upload.jpg')}}" data-max-file-size="2M" required/>
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Image</p>
                                                    </div>
                                                    <hr>
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" name="thumbnail_image" id="input-file-max-fs" class="dropify" data-default-file="{{asset('default/default_upload.jpg')}}" data-max-file-size="1M" required />
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Thumbnail Image</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="title">Title <span class="text-danger">*</span> </label>
                                                                    <input type="text" name="title" class="form-control mb-4" id="title" placeholder="Title" value="{{old('title')}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="slug">Slug <span class="text-danger">*</span> </label>
                                                                    <input type="text" name="slug" class="form-control mb-4" id="slug" value="{{old('slug')}}" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="parent_id" class="dob-input">parent Category <span class="text-danger">*</span> </label>
                                                                <div class="form-group mr-1">
                                                                    <select class="form-control" id="parent_id" required>
                                                                        <option value="">Select</option>
                                                                        @foreach($categories as $category)
                                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="category_id" class="dob-input"> Category <span class="text-danger">*</span> </label>
                                                                <div class="form-group mr-1">
                                                                    <select class="form-control" name="category_id" id="category_id" required>
                                                                        <option value="">Select</option>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="location_id" class="dob-input"> Location <span class="text-danger">*</span> </label>
                                                                <div class="form-group mr-1">
                                                                    <select class="form-control" name="location_id" id="location_id" required>
                                                                        <option value="">Select</option>
                                                                        @foreach($locations as $location)
                                                                            <option value="{{$location->id}}">{{$location->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="address">Address <span class="text-danger">*</span> </label>
                                                                    <input type="text" name="address" class="form-control mb-4" id="address" placeholder="Address" value="{{old('address')}}" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="phone">Phone <span class="text-danger">*</span> </label>
                                                                    <input type="number" name="phone" class="form-control mb-4" id="phone" placeholder="Phone" value="{{old('phone')}}" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="email">Email <span class="text-danger">*</span> </label>
                                                                    <input type="email" name="email" class="form-control mb-4" id="email" placeholder="Email" value="{{old('email')}}" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="map_embed_code">Map Embed Code </label>
                                                                    <input type="text" name="map_embed_code" class="form-control mb-4" id="map_embed_code" placeholder="Map Embed Code" value="{{old('map_embed_code')}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="amenity_id">Amenity </label>
                                                                    <select name="amenity_id[]" id="amenity_id" class="form-control tagging" multiple="multiple">
                                                                        @foreach($amenities as $amenity)
                                                                            <option value="{{$amenity->id}}">{{$amenity->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Status <span class="text-danger">*</span> </label>
                                                                    <div class="row mt-2">
                                                                        <input type="radio" name="status" class=" mb-4" id="status_active" value="1" checked> <label for="status_active" class="text-success ml-1 mr-1">Active</label>
                                                                        <input type="radio" name="status" class=" mb-4 ml-5" id="status_inactive" value="0" ><label for="status_inactive" class="text-danger ml-1 mr-1">Inactive</label>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Is Featured <span class="text-danger">*</span> </label>
                                                                    <div class="row mt-2">
                                                                        <input type="radio" name="is_featured" class=" mb-4 " id="is_featured_inactive" value="0" checked><label for="is_featured_inactive" class="text-danger ml-1 mr-1">No</label>
                                                                        <input type="radio" name="is_featured" class=" mb-4 ml-5" id="is_featured_active" value="1" > <label for="is_featured_active" class="text-success ml-1 mr-1">Yes</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Is Verified <span class="text-danger">*</span> </label>
                                                                    <div class="row mt-2">
                                                                        <input type="radio" name="is_verified" class=" mb-4" id="is_verified_yes" value="1" checked> <label for="is_verified_yes" class="text-success ml-1 mr-1">Yes</label>
                                                                        <input type="radio" name="is_verified" class=" mb-4 ml-5" id="is_verified_no" value="0" ><label for="is_verified_no" class="text-danger ml-1 mr-1">No</label>
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
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing ">
                        <div class="section social">
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
                                                    <input type="text" class="form-control" name="linkedin_link" aria-label="Username" aria-describedby="linkedin" value="{{old('linkedin_link')}}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group social-tweet mb-3">
                                                    <div class="input-group-prepend mr-3">
                                                        <span class="input-group-text" id="tweet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="x_link" aria-label="Username" aria-describedby="tweet" value="{{old('x_link')}}">
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
                                                    <input type="text" class="form-control" name="facebook_link" aria-label="Username" aria-describedby="fb" value="{{old('facebook_link')}}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group social-github mb-3">
                                                    <div class="input-group-prepend mr-3">
                                                        <span class="input-group-text" id="github">
                                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="instagram_link" aria-label="Username" aria-describedby="instagram" value="{{old('instagram_link')}}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group social-github mb-3">
                                                    <div class="input-group-prepend mr-3">
                                                                <span class="input-group-text" id="github">
                                                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                                                </span>
                                                    </div>
                                                    <input type="text" name="whatsapp_link" class="form-control" aria-label="Username" aria-describedby="whats up" value="{{old('whatsapp_link')}}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group social-github mb-3">
                                                    <div class="input-group-prepend mr-3">
                                                        <span class="input-group-text" id="website">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" y1="8" x2="12" y2="8"></line><line x1="3.95" y1="6.06" x2="8.54" y2="14"></line><line x1="10.88" y1="21.94" x2="15.46" y2="14"></line></svg>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="website" class="form-control" aria-label="website" aria-describedby="website" placeholder="website" value="{{old('website')}}">
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section social">
                            <div class="info">
                                <h5 class="">About</h5>
                                <div class="row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description" placeholder="about listing" rows="10">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section social">
                            <div class="info">
                                <h5 class="">Seo (Search Engine Optimization)</h5>
                                <div class="row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="seo_title">Seo Title </label>
                                                    <input type="text" name="seo_title" class="form-control mb-4" id="seo_title" placeholder="Seo Title" value="{{old('seo_title')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="seo_description">Seo Description </label>
                                                    <input type="text" name="seo_description" class="form-control mb-4" id="seo_description" placeholder="seo description" value="{{old('seo_description')}}" >
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

        <div class="account-settings-footer">

            <div class="as-footer-container">

                <button type="reset" form="listing" class="btn btn-warning">Reset All</button>
                <button type="submit" form="listing" class="btn btn-primary">Save </button>

            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script src="{{asset('admin/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('admin/plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/users/account-settings.js')}}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->

    <!-- SELECT2 -->
    <script src="{{asset('admin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('admin/plugins/select2/custom-select2.js')}}"></script>
    <script>
        $(".tagging").select2({
            tags: true
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#parent_id').change(function() {
                var parentId = $(this).val();
                var token = "{{ csrf_token() }}";
                $.ajax({
                    url: '/admin/ajax/get-child-categories',
                    method: 'POST',
                    data: {
                        parent_id: parentId ,
                        _token: token // اضافه کردن توکن CSRF به داده‌های ارسالی
                    },
                    success: function(response) {
                        // پر کردن گزینه‌های مجموعه‌های فرزند با داده‌های دریافتی
                        // $('#category_id').empty(); // پاک کردن گزینه‌های قبلی
                        $.each(response, function(index, category) {
                            $('#category_id').append($('<option>', {
                                value: category.id,
                                text: category.name
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>

@endpush
