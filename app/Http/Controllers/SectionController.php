<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Section;
use Auth;

class SectionController extends Controller
{
    public function index()
    {
        return view('foundations.academics.sections.index');
    }

    public function getAll()
    {
        return Section::orderBy('name')->get();
    }

    public function getOne(Request $request)
    {
        return Section::find($request->id);
    }

    public function store(Request $request, Section $section)
    {
        $this->validateData($request, $section);

        $section->name = $request->name;

        $section->save();

        return 200;
    }

    public function update(Request $request)
    {
        $section = Section::find($request->id);

        $this->validateData($request, $section);

        $section->name = $request->name;

        $section->save();

        return 200;
    }

    public function destroy(Request $request)
    {
        $section = Section::find($request->id);
        
        if (count($section->course) == 0) {
            $section->delete();
        } else {
            abort(500);
        }
    }

    public function validateData($request, $section)
    {
        $validator = $request->validate([
            'name' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('sections')->ignore($section)->whereNull('deleted_at')
            ],
        ]);
    }
}
