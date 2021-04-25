<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('system.users.index');
    }

    public function getAll()
    {
        return User::orderBy('name')->get();
    }

    public function getOne(Request $request)
    {
        return User::find($request->id);
    }

    public function store(Request $request, User $user)
    {
        $validator = $request->validate([
            'name' => [
                'required',
            ],
            'lastname' => [
                'required',
            ],
            'ci' => [
                'required',
                'integer',
                Rule::unique('users')->ignore($user)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user)
            ],
            'password' => [
                'required',
                'min:8'
            ],
        ]);

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->ci = $request->ci;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        $validator = $request->validate([
            'name' => [
                'required',
            ],
            'lastname' => [
                'required',
            ],
            'ci' => [
                'required',
                Rule::unique('users')->ignore($user),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user),
            ],
        ]);

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->ci = $request->ci;
        $user->email = $request->email;

        $user->save();
    }

    public function deactivate(Request $request)
    {
        $user = User::find($request->id);

        if ($user->id != Auth::user()->id) {
            $user->status = 'Inactivo';

            $user->save();
        } else {
            abort(500);
        }
    }

    public function reactivate(Request $request)
    {
        $user = User::find($request->id);

        $user->status = 'Activo';

        $user->save();
    }

    public function resetVerified(Request $request)
    {
        $user = User::find($request->id);

        if ($user->id != Auth()->user()->id) {
            $user->verified = '0';

            $user->save();
        } else {
            abort(500);
        }
    }

    public function resetAttempts(Request $request)
    {
        $user = User::find($request->id);

        $user->failed_attempt = '0';

        $user->save();
    }
}
