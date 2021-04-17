<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Subject;
use App\Models\Area;
use Auth;

class SubjectController extends Controller
{
    public function index()
    {
        return view('foundations.academics.subjects.index');
    }

    public function getAll()
    {
        return Subject::with('area')->orderBy('name')->get();
    }

    public function getAllAreas()
    {
        return Area::where('status', 'Activo')->orderBy('name')->get();
    }

    public function getOne(Request $request)
    {
        return Subject::with('area')->where('id', $request->id)->first();
    }

    public function store(Request $request, Subject $subject)
    {
        $this->validateData($request, $subject);

        $subject->area_id = $request->area_id;
        $subject->name = $request->name;
        $subject->acronym = $request->acronym;

        $subject->save();

        return 200;
    }

    public function update(Request $request)
    {
        $subject = Subject::find($request->id);

        $this->validateData($request, $subject);

        $subject->area_id = $request->area_id;
        $subject->name = $request->name;
        $subject->acronym = $request->acronym;

        $subject->save();

        return 200;
    }

    public function destroy(Request $request)
    {
        $subject = Subject::find($request->id);

        if (count($subject->area) == 0) {
            $subject->delete();
        } else {
            abort(500);
        }
    }

    public function validateData($request, $subject)
    {
        $validator = $request->validate([
            'name' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('subjects')->ignore($subject)->whereNull('deleted_at')
            ],
            'acronym' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('subjects')->ignore($subject)->whereNull('deleted_at')
            ],
            'area_id' => [
                'required',
            ],
        ]);
    }
}
