@extends('admin.layouts.master')

@section('title', ' Create Schedule Gallery ')

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="row layout-top-spacing">
            <div id="fuMultipleFile" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Record Schedule For <span class="text-danger">{{$listing->title}}</span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form method="POST" action="{{route('admin.schedule.store',$listing->id)}}" >
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Close</th>
                                </tr>
                                @foreach(['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
                                    <tr>
                                        <td>{{ $day }}</td>
                                        <td><input class="form-control" type="time" name="start_time[{{ $day }}]" value="08:00"></td>
                                        <td><input class="form-control" type="time" name="end_time[{{ $day }}]" value="20:00"></td>
                                        <td><input type="checkbox" name="close[{{ $day }}]"></td>
                                    </tr>
                                @endforeach

                            </table>
                            <div class="rw">
                                <button type="submit" class="btn btn-primary mt-4 mb-4">create Schedule</button>
                            </div>
                        </form>


                        <div>
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <th>#</th>
                                <th>image</th>
                                <th>action</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
@endsection
@push('scripts')

@endpush
