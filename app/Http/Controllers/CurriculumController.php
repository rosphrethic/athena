<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use Auth;

class CurriculumController extends Controller
{
    public function index()
    {
        return view('plans.curriculums.index');
    }

    public function getAll()
    {
        return Curriculum::with('course', 'course.section', 'course.baccalaureate', 'course.grade')->get();
    }

    public function getOne(Request $request)
    {
        return Curriculum::with('course')->where('id', $request->id)->first();
    }

    public function store(Request $request, Curriculum $curriculum)
    {
        $this->validateData($request, $curriculum);

        $curriculum->user_id = Auth::user()->id;
        $curriculum->course_id = $request->course_id;

        if ($curriculum->course->baccalaureate) {
            $file_name = 'mc_' . $curriculum->course->year . '_' . $curriculum->course->branch->acronym . '_' . $curriculum->course->grade->name . '_' . $curriculum->course->section->name . '_' . $curriculum->course->shift . '_' . $curriculum->course->baccalaureate->acronym . '.';
        } else {
            $file_name = 'mc_' . $curriculum->course->year . '_' . $curriculum->course->branch->acronym . '_' . $curriculum->course->grade->name . '_' . $curriculum->course->section->name . '_' . $curriculum->course->shift . '.';
        }

        $file_extension = $request->file->getClientOriginalExtension();

        $save_img = $request->file('file')->storeAs('public/curriculums/' . $curriculum->course->year, ($file_name . $file_extension));

        $file_path_db = $file_name . $file_extension;

        $curriculum->file = $file_path_db;

        $curriculum->save();
    }

    public function update(Request $request)
    {
        $curriculum = Curriculum::find($request->id);

        if ($request->file) {
            if ($curriculum->course->baccalaureate) {
                $file_name = 'mc_' . $curriculum->course->year . '_' . $curriculum->course->branch->acronym . '_' . $curriculum->course->grade->name . '_' . $curriculum->course->section->name . '_' . $curriculum->course->shift . '_' . $curriculum->course->baccalaureate . '.';
            } else {
                $file_name = 'mc_' . $curriculum->course->year . '_' . $curriculum->course->branch->acronym . '_' . $curriculum->course->grade->name . '_' . $curriculum->course->section->name . '_' . $curriculum->course->shift . '.';
            }

            $file_extension = $request->file->getClientOriginalExtension();

            $save_img = $request->file('file')->storeAs('public/curriculums/' . $curriculum->course->year, ($file_name . $file_extension));

            $file_path_db = $file_name . $file_extension;

            $curriculum->file = $file_path_db;
        }

        $curriculum->course_id = $request->course_id;

        $curriculum->save();
    }

    public function anull(Request $request)
    {
        $curriculum = Curriculum::find($request->id);

        $curriculum->status = 'Anulado';

        $curriculum->save();
    }

    public function open(Request $request)
    {
        $curriculum = Curriculum::find($request->id);

        $curriculum->status = 'Anulado';

        $curriculum->save();
    }

    public function validateData($request, $curriculum)
    {
        $validator = $request->validate([
            'course_id' => [
                'required',
            ],
            'file' => [
                'required',
                'mimes:jpg,jpeg,png,pdf,doc,docx',
                'max:5000',
            ]
        ]);
    }
}
