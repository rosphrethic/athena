<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Branch;
use Auth;

class BranchController extends Controller
{
    public function index()
    {
        return view('system.branches.index');
    }

    public function getAll()
    {
        return Branch::orderBy('name')->get();
    }

    public function getOne(Request $request)
    {
        return Branch::find($request->id);
    }

    public function store(Request $request, Branch $branch)
    {
        $this->validateData($request, $branch);

        $branch->name = $request->name;
        $branch->acronym = $request->acronym;
        $branch->telephone = $request->telephone;
        $branch->address = $request->address;
        $branch->save();

        return 200;
    }

    public function update(Request $request)
    {
        $branch = Branch::find($request->id);

        $this->validateData($request, $branch);

        $branch->name = $request->name;
        $branch->acronym = $request->acronym;
        $branch->telephone = $request->telephone;
        $branch->address = $request->address;

        $branch->save();

        return 200;
    }

    public function deactivate(Request $request)
    {
        $branch = Branch::find($request->id);

        if ($branch->name != session('branch_name')) {
            $branch->status = 'Inactivo';

            $branch->save();

            return 200;
        } else {
            abort(500);
        }
    }

    public function reactivate(Request $request)
    {
        $branch = Branch::find($request->id);

        $branch->status = 'Activo';

        $branch->save();

        return 200;
    }

    // ADD FOREIGN KEY CHECKER LATER
    public function destroy(Request $request)
    {
        $branch = Branch::find($request->id);

        if ($branch->name != session('branch_name')) {
                $branch->delete();
         } else {
            abort(500);
        }
    }

    public function validateData($request, $branch)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('branches')->ignore($branch)->whereNull('deleted_at')
            ],
            'acronym' => [
                'required',
                Rule::unique('branches')->ignore($branch)->whereNull('deleted_at')
            ],
            'telephone' => [
                'required',
                Rule::unique('branches')->ignore($branch)->whereNull('deleted_at')
            ],
            'address' => [
                'required',
                Rule::unique('branches')->ignore($branch)->whereNull('deleted_at')
            ],
        ]);
    }
}
