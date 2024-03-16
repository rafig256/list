@extends('admin.layouts.master')

@section('title', 'Schedule')

@push('css')
    <link href="{{asset('admin/assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />
@endpush
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{asset('admin/assets/css/elements/custom-pagination.css')}}" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  -->
@section('content')
    <div id="tableProgress" class="col-lg-12 col-12 layout-spacing mt-5">
        <div class="statbox widget box box-shadow">
            <div class="widget-header p-3">
                <div class="row">
                    <div class="col-xl-8 col-md-8 col-sm-8 col-8">
                        <h4>Schedule Table</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Listing</th>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Close</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schedules as $schedule)
                            <tr>
                                <td class="text-center">{{$schedule->id}}</td>
                                <td>{{$schedule->listing->title}}</td>
                                <td>
                                    {{$schedule->day}}
                                </td>
                                <td>
                                    {{$schedule->status ? 'close' : $schedule->start_time}}
                                </td>
                                <td>{{$schedule->status ?  'close' : $schedule->end_time }}</td>
                                <td>{!! !$schedule->status ? '<span class="badge badge-success"> Open during announced hours </span>' : '<span class="badge badge-danger"> Closed for the whole day </span>' !!}</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="{{route('admin.schedule.create',$schedule->listing->id)}}"  data-toggle="tooltip" data-placement="top" title="Edit" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                            </a>
                                        </li>
                                        <li>
                                            @if(!$schedule->status)
                                            <a href="{{route('admin.schedule.destroy',$schedule->id)}}" data-toggle="tooltip" data-placement="top" title="close" class="text-danger">
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>--}}
                                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 40 40" width="16px" height="16px"><path fill="#f78f8f" d="M21 24.15L8.857 36.293 4.707 32.143 16.85 20 4.707 7.857 8.857 3.707 21 15.85 33.143 3.707 37.293 7.857 25.15 20 37.293 32.143 33.143 36.293z"/><path fill="#c74343" d="M33.143,4.414l3.443,3.443L25.15,19.293L24.443,20l0.707,0.707l11.436,11.436l-3.443,3.443 L21.707,24.15L21,23.443l-0.707,0.707L8.857,35.586l-3.443-3.443L16.85,20.707L17.557,20l-0.707-0.707L5.414,7.857l3.443-3.443 L20.293,15.85L21,16.557l0.707-0.707L33.143,4.414 M33.143,3L21,15.143L8.857,3L4,7.857L16.143,20L4,32.143L8.857,37L21,24.857 L33.143,37L38,32.143L25.857,20L38,7.857L33.143,3L33.143,3z"/></svg>
                                            </a>
                                            @endif
                                        </li>
                                    </ul>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>


                </div>

                <div class="paginating-container pagination-default">
                    <ul class="pagination">
                        <li class="prev"><a href="{{ $schedules->url(1) }}">first</a></li>
                        @foreach ($schedules->items() as $page =>$schedule)
                            @if ($page > 0)
                                @if($schedules->currentPage() > 1)
                                    <li><a href="{{$schedules->previousPageUrl()}}">{{$schedules->currentPage() - 1}}</a> </li>
                                @endif
                                <li class="active">
                                    <a href="">{{ $schedules->currentPage() }}</a>
                                </li>
                                @if(!$schedules->onLastPage())
                                    <li><a href="{{$schedules->nextPageUrl()}}">{{$schedules->currentPage() + 1}}</a> </li>
                                @endif
                            @endif
                        @endforeach
                        <li class="next"><a href="{{ $schedules->url($schedules->lastPage()) }}">Last</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
