@extends('frontend.dashboard.layouts.master')
@section('title','My Listing')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <!--  END CUSTOM STYLE FILE  -->
@endpush

@section('content')
    <div class="my_listing schedule">
        <h4 style="justify-content: space-between">Listing<a href="{{route('user.listing.create')}}" class="btn btn-sm btn-primary">create</a></h4>

        <div class="">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Gallery</th>
                    <th>status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listings as $listing)
                    <tr>
                        <td class="text-center">{{++$loop->index}}</td>
                        <td>{{$listing->title}}</td>
                        <td>
                            {{$listing->category->name}}
                        </td>
                        <td>
                            {{$listing->location->name}}
                        </td>
                        <td>{{$listing->ImagesGallery->count()}} Image/s</td>
                        <td>
                            {!! $listing->status ? '<span class="badge bg-success"> Active </span>' : '<span class="badge bg-danger"> DeActive </span>' !!}
                            {!! $listing->is_verified ? '<span class="badge bg-info"> Verified </span>' : '<span class="badge bg-danger"> No Verify </span>' !!}
                            {!! $listing->is_featured ? '<span class="badge bg-primary"> Featured </span>' : '<span class="badge bg-danger"> No Featured </span>' !!}
                        </td>
                        <td class="text-center action">
                            <ul class="table-controls">
                                <li><a href="{{route('admin.listing.edit',$listing->id)}}" class="editIcon" title="Edit" >
                                        <i class="fal fa-edit"></i>
                                    </a>
                                </li>
                                <li><form action="{{route('admin.listing.destroy',$listing->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="trashIcon" type="submit" title="Delete">
                                        <i class="fal fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <div class="btn-group mb-4 mr-2" style="vertical-align:baseline !important">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('scripts')
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{asset('admin/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
@endpush
