<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Cause;
use Auth;

class CauseController extends Controller
{
    public function index()
    {
        return view('foundations.documentaries.causes.index');
    }

    public function getAll()
    {
        return Cause::orderBy('name')->get();
    }

    public function getOne(Request $request)
    {
        return Cause::find($request->id);
    }

    public function store(Request $request, Cause $cause)
    {
        $this->validateData($request, $cause);

        $cause->type = $request->type;
        $cause->name = $request->name;

        $cause->save();

        return 200;
    }

    public function update(Request $request)
    {
        $cause = Cause::find($request->id);

        $this->validateData($request, $cause);

        $cause->type = $request->type;
        $cause->name = $request->name;

        $cause->save();

        return 200;
    }

    public function destroy(Request $request)
    {
        $cause = Cause::find($request->id);
     
        if (count($cause->justificationStudent) == 0
            || count($cause->sanctionStudent) == 0
            || count($cause->desertionStudent) == 0) {
            $cause->delete();
        } else {
            abort(500);
        }
    }

    public function validateData($request, $cause)
    {
        $validated = $request->validate([
            'type' => [
                'required',
                'between:1,255',
            ],
            'name' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('causes')->ignore($cause)->whereNull('deleted_at')
            ],
        ]);
    }
}
