<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\City;
use Auth;

class CityController extends Controller
{
    public function index()
    {
        return view('foundations.documentaries.cities.index');
    }

    public function getAll()
    {
        return City::orderBy('name')->get();
    }

    public function getOne(Request $request)
    {
        return City::find($request->id);
    }

    public function store(Request $request, City $city)
    {
        $this->validateData($request, $city);

        $city->name = $request->name;
        $city->acronym = strtoupper($request->acronym);

        $city->save();

        return 200;
    }

    public function update(Request $request)
    {
        $city = City::find($request->id);

        $this->validateData($request, $city);

        $city->name = $request->name;
        $city->acronym = strtoupper($request->acronym);

        $city->save();
    }

    public function destroy(Request $request)
    {
        $city = City::find($request->id);
        
        if (count($city->guardian) == 0) {
            $city->delete();
        } else {
            abort(500);
        }
    }

    public function validateData($request, $city)
    {
        $validator = $request->validate([
            'name' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('cities')->ignore($city)->whereNull('deleted_at')
            ],
            'acronym' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('cities')->ignore($city)->whereNull('deleted_at')
            ],
        ]);
    }
}
