<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\Role;
use App\Models\User;
use DB;
use Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $current_user_id = Auth::user()->id;
        $administrator_rol_id = Role::where('name', 'Administrador')->pluck('id')->first();
        $is_admin = count(RoleUser::where([['user_id', $current_user_id], ['role_id', $administrator_rol_id]])->get());

        if ($is_admin == 0) {
            return redirect('/')->with('error-message', '¡No tienes permisos suficientes para ingresar en esta página!');
        }

        return $next($request);
    }
}
