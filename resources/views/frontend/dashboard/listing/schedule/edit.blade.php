@extends('frontend.dashboard.layouts.master')

@section('title','Edit Schedules')

@section('content')
    <div id="content" class="main-content">
        <div class="row layout-top-spacing">
            <div id="fuMultipleFile" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Edit Schedule For <span class="text-danger" style="font-size: 22px">{{$listing->title}}</span></h4>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content widget-content-area">
                        <form method="POST" action="{{route('user.schedule.update',$listing->id)}}" >
                            @csrf
                            @method('PUT')
                            <table class="table table-bordered">
                                <tr>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Close</th>
                                </tr>
                                @foreach($listing->schedules as $schedule)
                                    <tr>
                                        <td>{{ $schedule->day }}</td>
                                        <td><input class="form-control" type="time" name="start_time[{{ $schedule->day }}]" value="{{(string)$schedule->start_time}}"></td>
                                        <td><input class="form-control" type="time" name="end_time[{{ $schedule->day }}]" value="{{(string)$schedule->end_time}}"></td>
                                        <td><input type="checkbox" name="close[{{ $schedule->day }}]" @checked($schedule->status)  ></td>
                                    </tr>
                                @endforeach

                            </table>
                            <div class="rw">
                                <button type="submit" class="btn btn-primary mt-4 mb-4">Edit Schedule</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
