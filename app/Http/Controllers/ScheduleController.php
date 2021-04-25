<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseRequirement;
use App\Models\Schedule;
use Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('plans.schedules.index');
    }

    public function getOne(Request $request)
    {
        return Schedule::where('course_id', $request->id)->get();
    }

    public function update(Request $request)
    {
        $schedule = Schedule::find($request->id);

        $schedule->from = $request->from;
        $schedule->to = $request->to;
        $schedule->monday = $request->monday;
        $schedule->tuesday = $request->tuesday;
        $schedule->wednesday = $request->wednesday;
        $schedule->thursday = $request->thursday;
        $schedule->friday = $request->friday;

        $schedule->save();
    }
}
