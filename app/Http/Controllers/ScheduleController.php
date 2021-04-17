<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseRequirement;
use Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('plans.schedules.index');
    }

    public function getOne(Request $request)
    {
        return Course::with('grade')->where('id', $request->id)->first();
    }

    public function update(Request $request)
    {
        $course = Course::find($request->id);

        $this->validateData($request, $course);

        $course->grade_id = explode('|', $request->grade_id)[0];
        $course->baccalaureate_id = $request->baccalaureate_id;
        $course->section_id = $request->section_id;
        $course->shift = $request->shift;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->tuition_fee = $request->tuition_fee;
        $course->installment_fee = $request->installment_fee;
        $course->installment_quantity = $request->installment_quantity;

        // if ($request->curriculum) {
        //     $validatedData = $request->validate([
        //         'curriculum' => [
        //             'mimes:jpg,jpeg,png,pdf,doc,docx',
        //             'max:5000',
        //         ]
        //     ]);

            // $file_name = 'malla_curricular_' . $course->year . '_' . $course->branch->name . '_' . $course->grade->name . '_' . $course->section->name . '_' . $course->shift . '_' . $course->baccalaureate->acronym.'.';

        //     $file_name = 'curriculum';
        //     $file_extension = $request->curriculum->getClientOriginalExtension();

        //     $save_img = $request->file('curriculums')->storeAs('public/curriculums', ($file_name . $file_extension));

        //     $file_path_db = $file_name . '.' . $file_extension;

        //     $course->curriculum = $file_path_db;
        // }

        $course->save();

        $course_requirement = CourseRequirement::where('course_id', $course->id)->delete();

        if ($request->requirement_id) {
            foreach ($request->requirement_id as $key => $requirement_id) {
                $course_requirement = new CourseRequirement;
                $course_requirement->course_id = $course->id;
                $course_requirement->requirement_id = $requirement_id;

                $course_requirement->save();
            }
        }
    }

    public function validateData($request, $course)
    {
        $validator = $request->validate([
            'grade_id' => [
                'required',
            ],
            'section_id' => [
                'required',
            ],
            'baccalaureate_id' => [
                'sometimes',
            ],
            'start_date' => [
                'required',
                'date',
            ],
            'end_date' => [
                'required',
                'date',
            ],
            'tuition_fee' => [
                'required',
                'integer',
                'between:1,1000000'
            ],
            'installment_fee' => [
                'required',
                'integer',
                'between:1,1000000'
            ],
            'installment_quantity' => [
                'required',
                'integer',
                'between:1,12'
            ],
        ]);
    }
}
