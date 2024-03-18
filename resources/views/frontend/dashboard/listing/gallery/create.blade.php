@extends('frontend.dashboard.layouts.master')
@section('title','Create Listing Gallery')
@push('css')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('admin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .custom-file-container__custom-file__custom-file-control__button{left:90%; right:0}
        .image-gallery {width: 200px}
    </style>
@endpush

@section('content')
    <div class="my_listing">
        <div class="d-flex justify-content-between">
            <h4>Add Image Gallery to <span class="text-danger" style="font-size: 22px">{{$listing->title}}</span></h4>
            <span>Go To <a href="{{route('user.listing.show',$listing->id)}}">{{$listing->title}}</a></span>
        </div>

        <form method="POST" action="{{route('user.gallery.store')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="listing_id" value="{{$listing->id}}">
            <div class="custom-file-container" data-upload-id="mySecondImage">
                <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                <label class="custom-file-container__custom-file" >
                    <input type="file" name="images[]" class="custom-file-container__custom-file__custom-file-input" multiple required>
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
            </div>
            <div class="rw">
                <button type="submit" class="btn btn-primary mt-4 mb-4">Upload Images</button>
            </div>
        </form>

    </div>
    <hr>
    <div>
        <table class="table table-bordered">
            <tr>
                <td>#</td>
                <td>Image</td>
                <td>Created at</td>
                <td>Action</td>
            </tr>
            @foreach($images as $image)
                <tr>
                    <td>{{++$loop->index}}</td>
                    <td><img src="{{asset($image->image)}}" class="img-thumbnail image-gallery" alt="image"/></td>
                    <td>{{$image->created_at}}</td>
                    <td>
                        <form action="{{ route('user.gallery.destroy', $image->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="trashIcon" type="submit" title="حذف">
                                <i class="fal fa-trash-alt"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@push('scripts')
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('admin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>

    <script>
        let secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
@endpush
