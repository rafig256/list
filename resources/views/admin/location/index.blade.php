@extends('admin.layouts.master')

@section('title', 'Location')

@push('css')
    <link href="{{asset('admin/assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div id="tableProgress" class="col-lg-12 col-12 layout-spacing mt-5">
        <div class="statbox widget box box-shadow">
            <div class="widget-header p-3">
                <div class="row">
                    <div class="col-xl-8 col-md-8 col-sm-8 col-8">
                        <h4>Location Table</h4>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-4 col-4">
                        <a href="{{route('admin.location.create')}}" class="btn btn-primary mt-2 float-right">Add New Location</a>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Slug</th>
                            <th>show At home</th>
                            <th>status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($locations as $location)
                        <tr>
                                <td class="text-center">{{$location->id}}</td>
                                <td>{{$location->name}}</td>
                                <td>{!! $location->parent->name ?? "<span class='text-success'>It is Parent Location</span>" !!}</td>
                                <td>
                                    {{$location->slug}}
                                </td>
                                <td>{!! $location->show_at_home ? '<span class="badge badge-success"> At Home </span>' : '<span class="badge badge-danger"> No </span>' !!}</td>
                                <td>{!! $location->status ? '<span class="badge badge-success"> Active </span>' : '<span class="badge badge-danger"> DeActive </span>' !!}</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="{{route('admin.location.edit',$location->id)}}"  data-toggle="tooltip" data-placement="top" title="Edit" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                        <li><form action="{{route('admin.location.destroy',$location->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                                <button class="btn btn-link border-0 bg-transparent" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                        </form>
                                        </li>
                                    </ul>
                                </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
