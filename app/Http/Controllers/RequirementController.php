<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Requirement;
use Auth;

class RequirementController extends Controller
{
    public function index()
    {
        return view('foundations.academics.requirements.index');
    }

    public function getAll()
    {
        return Requirement::orderBy('name')->get();
    }

    public function getOne(Request $request)
    {
        return Requirement::find($request->id);
    }

    public function store(Request $request, Requirement $requirement)
    {
        $this->validateData($request, $requirement);

        $requirement->name = $request->name;

        $requirement->save();
    }

    public function update(Request $request)
    {
        $requirement = Requirement::find($request->id);

        $this->validateData($request, $requirement);

        $requirement->name = $request->name;

        $requirement->save();
    }

    public function destroy(Request $request)
    {
        $requirement = Requirement::find($request->id);
        
        if (count($requirement->courseRequirement) == 0) {
            $requirement->delete();
        } else {
            abort(500);
        }
    }

    public function validateData($request, $requirement)
    {
        $validator = $request->validate([
            'name' => [
                'required',
                'between:1,255',
                Rule::unique('nationalities')->ignore($requirement)->whereNull('deleted_at')
            ],
        ]);
    }
}
