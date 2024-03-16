<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function index()
    {
        //All Schedule Show
        $schedules = Schedule::all();
        return view('admin.listing.schedule.index',compact('schedules',));
    }
    public function create(Listing $listing)
    {
        if (Schedule::query()->where('listing_id', $listing->id)->exists()){
            //Edit Schedule
            return view('admin.listing.schedule.edit',compact(['listing']));
        }
        //create new Schedule
        return view('admin.listing.schedule.create',compact('listing'));
    }

    public function store(Request $request , Listing $listing)
    {
        // Validate input (you can add other validation rules as needed)
        $request->validate([
            'start_time.*' => 'nullable|date_format:H:i',
            'end_time.*' => 'nullable|date_format:H:i',
        ]);
        // Save business hours data to the database
        foreach ($request->input('start_time') as $day => $startTime) {
            $endTime = $request->input('end_time')[$day];
            $close = $request->input('close')[$day] ?? false;
            Schedule::query()->create((array)[
                'listing_id' => $listing->id,
                'day' => $day ,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'status' => $close ? 1 : 0,
            ]);
        }
        toastr()->success('Schedule created successfully.');

        return to_route('admin.listing.index');
    }

    public function update(Request $request, Listing $listing)
    {
//        dd($request->all());
        // Validate input (you can add other validation rules as needed)
        $request->validate([
            'start_time.*' => 'nullable|string',
            'end_time.*' => 'nullable|string',
        ]);
        // Save business hours data to the database
        foreach ($request->input('start_time') as $day => $startTime) {
            $endTime = $request->input('end_time')[$day];
            $close = $request->input('close')[$day] ?? false;
            Schedule::query()->where('listing_id',$listing->id)->where('day',$day)->update((array)[
                'listing_id' => $listing->id,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'status' => $close ? 1 : 0,
            ]);
        }
        toastr()->success('Schedule Update successfully.');

        return to_route('admin.listing.index');
    }
}
