<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Auth;
use DB;

class RoleController extends Controller
{
    public function index()
    {
        return view('system.roles.index');
    }

    public function getAll()
    {
        return Role::orderBy('name')->get();
    }

    public function getAllUsers()
    {
        return RoleUser::with('user', 'role')->get();
    }

    public function getOne(Request $request)
    {
        return Role::find($request->id);
    }

    public function store(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('roles')->ignore($role)->whereNull('deleted_at')
            ],
        ]);

        $role->name = $request->name;

        $role->save();

        return 200;
    }

    public function update(Request $request)
    {
        $role = Role::find($request->id);

        $validatedData = $request->validate([
            'name' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('roles')->ignore($role)->whereNull('deleted_at')
            ],
        ]);

        $role->name = $request->name;

        $role->save();

        return 200;
    }

    public function assign(Request $request, RoleUser $role_user)
    {
        $user = User::where('ci', $request->ci)->first();
        $user_exists = RoleUser::where('user_id', $user->id)->first();

        if ($user_exists) {
            $role_user = RoleUser::where('user_id', $user->id)->update(['role_id' => $request->role_id]);
        } else {
            $role_user->user_id = $user->id;
            $role_user->role_id = $request->role_id;

            $role_user->save();
        }

        return 200;
    }

    public function deactivate(Request $request)
    {
        $role = Role::find($request->id);

        $roles_used = RoleUser::where('role_id', '>', 0)->distinct()->pluck('role_id')->toArray();

        if (in_array($request->id, $roles_used)) {
            abort(500);
        } else {
            $role->status = 'Inactivo';

            $role->save();
        }
    }

    public function reactivate(Request $request)
    {
        $role = Role::find($request->id);

        $role->status = 'Activo';

        $role->save();

        return 200;
    }
}
