@extends('frontend.dashboard.layouts.master')
@section('title','My Listing')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endpush

@section('content')
    <div class="my_listing">
        <h4>Listing</h4>
        <div class="">
            <table class="table table-bordered">
                <thead>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Location</th>
                <th>Image</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($listings as $listing)
                    <tr>
                        <td>{{++$loop->index}}</td>
                        <td>{{$listing->title}}</td>
                        <td>{{$listing->category->name}}</td>
                        <td>{{$listing->location->name}}</td>
                        <td><img src="{{asset($listing->image)}}" width="100px"></td>
                        <td>programming</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('scripts')
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{asset('admin/assets/js/users/account-settings.js')}}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
@endpush
