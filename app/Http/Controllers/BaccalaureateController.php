<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Baccalaureate;
use App\Models\Area;
use Auth;

class BaccalaureateController extends Controller
{
    public function index()
    {
        return view('foundations.academics.baccalaureates.index');
    }

    public function getAll()
    {
        return Baccalaureate::orderBy('name')->get();
    }

    public function getOne(Request $request)
    {
        return Baccalaureate::find($request->id);
    }

    public function store(Request $request, Baccalaureate $baccalaureate)
    {
        $this->validateData($request, $baccalaureate);

        $baccalaureate->name = $request->name;
        $baccalaureate->acronym = strtoupper($request->acronym);

        $baccalaureate->save();

        return 200;
    }

    public function update(Request $request)
    {
        $baccalaureate = Baccalaureate::find($request->id);

        $this->validateData($request, $baccalaureate);

        $baccalaureate->name = $request->name;
        $baccalaureate->acronym = strtoupper($request->acronym);

        $baccalaureate->save();

        return 200;
    }

    public function destroy(Request $request)
    {
        $baccalaureate = Baccalaureate::find($request->id);
        
        if (count($baccalaureate->course) == 0) {
            $baccalaureate->delete();
        } else {
            abort(500);
        }
    }

    public function validateData($request, $baccalaureate)
    {
        $validator = $request->validate([
            'name' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('baccalaureates')->ignore($baccalaureate)->whereNull('deleted_at')
            ],
            'acronym' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('baccalaureates')->ignore($baccalaureate)->whereNull('deleted_at')
            ],
        ]);
    }
}
