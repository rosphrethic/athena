<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Nationality;
use Auth;

class NationalityController extends Controller
{
    public function index()
    {
        return view('foundations.documentaries.nationalities.index');
    }

    public function getAll()
    {
        return Nationality::orderBy('name')->get();
    }

    public function getOne(Request $request)
    {
        return Nationality::find($request->id);
    }

    public function store(Request $request, Nationality $nationality)
    {
        $this->validateData($request, $nationality);

        $nationality->name = $request->name;
        $nationality->acronym = $request->acronym;

        $nationality->save();

        return 200;
    }

    public function update(Request $request)
    {
        $nationality = Nationality::find($request->id);

        $this->validateData($request, $nationality);

        $nationality->name = $request->name;
        $nationality->acronym = $request->acronym;

        $nationality->save();

        return 200;
    }

    public function destroy(Request $request)
    {
        $nationality = Nationality::find($request->id);
        
        if (count($nationality->student) == 0) {
            $nationality->delete();
        } else {
            abort(500);
        }
    }

    public function validateData($request, $nationality)
    {
        $validator = $request->validate([
            'name' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('nationalities')->ignore($nationality)->whereNull('deleted_at')
            ],
            'acronym' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('nationalities')->ignore($nationality)->whereNull('deleted_at')
            ],
        ]);
    }
}
