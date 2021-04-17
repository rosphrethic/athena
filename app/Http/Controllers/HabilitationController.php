<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habilitation;
use App\Models\Subject;
use Auth;

class HabilitationController extends Controller
{
    public function index()
    {
        return view('plans.habilitations.index');
    }

    public function getAll(Request $request)
    {
        return Habilitation::with('subject')->where('course_id', $request->id)->get();
    }

    public function getAllSubjects(Request $request)
    {
        $existing_subjects = Habilitation::where([['course_id', $request->id], ['subject_id', '>', 0], ['status', 'Activo']])->pluck('subject_id')->toArray();

        return Subject::all()->except($existing_subjects);
    }

    public function getOne(Request $request)
    {
        return Habilitation::find($request->id);
    }

    public function store(Request $request, Habilitation $habilitation)
    {
        $this->validateData($request, $habilitation);

        $habilitation->user_id = Auth::user()->id;
        $habilitation->course_id = $request->course_id;
        $habilitation->subject_id = $request->subject_id;
        $habilitation->modality = $request->modality;
        $habilitation->required = $request->required;
        $habilitation->hour_weekly = $request->hour_weekly;
        $habilitation->average_required = $request->average_required;


        $habilitation->save();
    }

    public function update(Request $request)
    {
        $habilitation = Habilitation::find($request->id);

        $this->validateData($request, $habilitation);

        $habilitation->modality = $request->modality;
        $habilitation->required = $request->required;
        $habilitation->hour_weekly = $request->hour_weekly;
        $habilitation->average_required = $request->average_required;

        $habilitation->save();
    }

    public function anull(Request $request)
    {
        $habilitation = Habilitation::find($request->id);

        $habilitation->status = 'Anulado';

        $habilitation->save();
    }

    public function validateData($request, $habilitation)
    {
        $validator = $request->validate([
            'course_id' => [
                'required',
            ],
            'subject_id' => [
                'required',
            ],
            'modality' => [
                'required',
            ],
            'required' => [
                'required',
            ],
            'hour_weekly' => [
                'required',
                'integer',
                'between:1,100'
            ],
            'average_required' => [
                'required',
                'integer',
                'between:1,100'
            ]
        ]);
    }
}
