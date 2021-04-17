<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index()
    {
        return view('foundations.academics.grades.index');
    }

    public function getAll()
    {
        return Grade::orderBy('name')->get();
    }

    public function getOne(Request $request)
    {
        return Grade::find($request->id);
    }

    public function store(Request $request, Grade $grade)
    {
        $this->validateData($request, $grade);

        $grade->name = $request->name;
        $grade->name_number = $request->name_number;
        $grade->name_text = $request->name_text;
        $grade->name_alternative = $request->name_alternative;
        $grade->level = $request->level;
        ($request->level == 'Educación Escolar Básica') ? $grade->level_acronym = 'EEB' : $grade->level_acronym = 'EM';

        $grade->save();

        return 200;
    }

    public function update(Request $request)
    {
        $grade = Grade::find($request->id);

        $this->validateData($request, $grade);

        $grade->name = $request->name;
        $grade->name_number = $request->name_number;
        $grade->name_text = $request->name_text;
        $grade->name_alternative = $request->name_alternative;
        $grade->level = $request->level;
        ($request->level == 'Educación Escolar Básica') ? $grade->level_acronym = 'EEB' : $grade->level_acronym = 'EM';

        $grade->save();

        return 200;
    }

    public function destroy(Request $request)
    {
        $grade = Grade::find($request->id);
        
        if (count($grade->course) == 0) {
            $grade->delete();
        } else {
            abort(500);
        }
    }

    public function validateData($request, $grade)
    {
        $validator = $request->validate([
            'name' => [
                'required',
                'between:1,255',
                Rule::unique('grades')->ignore($grade)->whereNull('deleted_at')
            ],
            'name_number' => [
                'required',
                'between:1,255',
                Rule::unique('grades')->ignore($grade)->whereNull('deleted_at')
            ],
            'name_text' => [
                'required',
                'between:1,255',
                Rule::unique('grades')->ignore($grade)->whereNull('deleted_at')
            ],
            'name_alternative' => [
                'required',
                'between:1,255',
                Rule::unique('grades')->ignore($grade)->whereNull('deleted_at')
            ],
            'level' => [
                'required',
            ],
        ]);
    }
}
