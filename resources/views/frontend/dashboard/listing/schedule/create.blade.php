@extends('frontend.dashboard.layouts.master')

@section('ttile','Create Schedule')

@section('content')
    <div class="my_listing">
        <h4>Create the Schedule For <span class="text-danger" style="font-size: 22px">{{$listing->title}}</span></h4>
        <div class="widget-content widget-content-area">
            <form method="POST" action="{{route('user.schedule.store',$listing->id)}}" >
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
        </div>
    </div>
@endsection
