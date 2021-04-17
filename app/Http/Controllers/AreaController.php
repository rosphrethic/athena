<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Area;
use Auth;

class AreaController extends Controller
{
    public function index()
    {
        return view('foundations.academics.areas.index');
    }

    public function getAll()
    {
        return Area::withCount('subject')->orderBy('name')->get();
    }

    public function getOne(Request $request)
    {
        return Area::find($request->id);
    }

    public function store(Request $request, Area $area)
    {
        $this->validateData($request, $area);

        $area->name = $request->name;

        $area->save();

        return 200;
    }

    public function update(Request $request)
    {
        $area = Area::find($request->id);

        $this->validateData($request, $area);

        $area->name = $request->name;

        $area->save();

        return 200;
    }

    public function destroy(Request $request)
    {
        $area = Area::find($request->id);

        if (count($area->subject) == 0) {
            $area->delete();
        } else {
            abort(500);
        }
    }

    public function validateData($request, $area)
    {
        $validator = $request->validate([
            'name' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('areas')->ignore($area)->whereNull('deleted_at')
            ],
        ]);
    }
}
