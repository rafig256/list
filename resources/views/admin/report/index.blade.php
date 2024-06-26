@extends('admin.layouts.master')

@section('title', 'Report List')

@push('css')
    <link href="{{asset('admin/assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div id="tableProgress" class="col-lg-12 col-12 layout-spacing mt-5">
        <div class="statbox widget box box-shadow">
            <div class="widget-header p-3">
                <div class="row">
                    <div class="col-xl-8 col-md-8 col-sm-8 col-8">
                        <h4>Report list Table</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>listing</th>
                            <th>Report Text</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td class="text-center">{{$report->id}}</td>
                                <td>{{$report->name}}</td>
                                <td>{{$report->email}}</td>
                                <td><a href="{{route('listing.show',$report->listing->slug)}}" target="_blank">{{$report->listing->title}}</a> </td>
                                <td>{{$report->message}}</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li>
                                            <form action="{{route('admin.report.destroy',$report->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-link border-0 bg-transparent" data-toggle="tooltip" onclick="return confirm('are you sure?')" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
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
