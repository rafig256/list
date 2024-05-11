@extends('admin.layouts.master')

@section('title','Edit Post')

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
                <form id="addPost" action="{{route('admin.post.update' , $post->id)}}" enctype="multipart/form-data" method="POST" class="">
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section social">
                            <div class="info">
                                <h5 class="">General Post Information</h5>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="title">Title <span class="text-danger">*</span> </label>
                                                                <input type="text" name="title" class="form-control mb-4" id="title" placeholder="Title" value="{{$post->title}}" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="slug">Slug <span class="text-danger">*</span> </label>
                                                                <input type="text" name="slug" class="form-control mb-4" id="slug" value="{{$post->slug}}" required>
                                                            </div>
                                                        </div>

                                                        @if($listing->count() > 0)
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="listing_id">My Listing</label>
                                                                <select name="listing_id" id="listing_id" class="form-control">
                                                                    <option value="">select</option>
                                                                @foreach($listing as $list)
                                                                    <option value="{{$list->id}}" @selected($post->listing_id == $list->id)>{{$list->title}}</option>
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="blog_category">Blog Category <span class="text-danger">*</span> </label>
                                                                <select name="blog_category[]" id="blog_category" class="form-control tagging" multiple="multiple" required>
                                                                    @foreach($blogCategories as $category)
                                                                        <option value="{{$category->id}}" @selected(in_array($category->id, $post->blogCategories->pluck('id')->toArray()))>{{$category->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>Status <span class="text-danger">*</span> </label>
                                                                <div class="row mt-2">
                                                                    <input type="radio" name="status" class=" mb-4" id="status_active" value="1" @checked($post->status)> <label for="status_active" class="text-success ml-1 mr-1">Active</label>
                                                                    <input type="radio" name="status" class=" mb-4 ml-5" id="status_inactive" value="0" @checked(!$post->status) ><label for="status_inactive" class="text-danger ml-1 mr-1">Inactive</label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>Is Popular <span class="text-danger">*</span> </label>
                                                                <div class="row mt-2">
                                                                    <input type="radio" name="is_popular" class=" mb-4 " id="is_popular_inactive" value="0" @checked(!$post->is_popular)><label for="is_popular_inactive" class="text-danger ml-1 mr-1">No</label>
                                                                    <input type="radio" name="is_popular" class=" mb-4 ml-5" id="is_popular_active" value="1" @checked($post->is_popular) > <label for="is_popular_active" class="text-success ml-1 mr-1">Yes</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                <div class="upload mt-4 pr-md-4">
                                                    <input type="file" name="image" id="input-file-max-fs" class="dropify" data-default-file="{{asset($post->image)}}" data-max-file-size="1M"/>
                                                    <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload New Image</p>
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
                                <h5 class="">Description</h5>
                                <div class="row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="form-group">
                                            <label for="description">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" id="description" placeholder="start writing" rows="10">{{$post->description}}</textarea>
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
                                                    <input type="text" name="seo_title" class="form-control mb-4" id="seo_title" placeholder="Seo Title" value="{{$post->seo_title ?? ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="seo_description">Seo Description </label>
                                                    <input type="text" name="seo_description" class="form-control mb-4" id="seo_description" placeholder="seo description" value="{{$post->seo_description ?? ""}}" >
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

                <button type="reset" form="addPost" class="btn btn-warning">Reset All</button>
                <button type="submit" form="addPost" class="btn btn-primary">Update </button>

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
@endpush
