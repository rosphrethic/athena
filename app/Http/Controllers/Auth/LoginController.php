<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Branch;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\CompanyData;
use DB;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $branches = Branch::where('status', 'Activo')->get();
        $company_data = CompanyData::find(1);

        return view('auth.login', compact('branches', 'company_data'));
    }

    protected function authenticated(Request $request)
    {
        $branch_id = $request->branch_id;
        $user_id = Auth::user()->id;
        $emblem = CompanyData::find(1);

        $branch = Branch::find($branch_id);
        $user = RoleUser::where('user_id', $user_id)->first();
        $user_role = $user->role->name;

        session()->put('branch_id', $branch->id);
        session()->put('branch_name', $branch->name);
        session()->put('branch_acronym', $branch->acronym);
        session()->put('role', $user_role);
        session()->put('emblem', $emblem->emblem);

        $user = User::find(Auth::user()->id);

        $user->last_login = now();

        $user->save();

        return redirect('/');
    }


    protected function attemptLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            throw ValidationException::withMessages([
                $this->username() => [Lang::get('auth.unknown')],
            ])->status(Response::HTTP_TOO_MANY_REQUESTS);
        }

        if ($user->status == 'Bloqueado') {
            throw ValidationException::withMessages([
                $this->username() => [Lang::get('auth.throttle')],
            ])->status(Response::HTTP_TOO_MANY_REQUESTS);
        } elseif ($user->status == 'Inactivo') {
            throw ValidationException::withMessages([
                $this->username() => [Lang::get('auth.inactive')],
            ])->status(Response::HTTP_TOO_MANY_REQUESTS);
        } else {
            return $this->guard()->attempt(
                $this->credentials($request), $request->filled('remember')
            );
        };
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $failed_attempt = User::where('email', $request->email)->first();

        if ($failed_attempt->failed_attempt == 2) {
            DB::update('UPDATE users SET status = "Bloqueado" WHERE email = "' . $request->email . '"');

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        } else {
            DB::update('UPDATE users SET failed_attempt = failed_attempt + 1 WHERE email = "' . $request->email . '"');

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }
    }

    public function logout() {
        $user = User::find(Auth::user()->id);

        $user->last_logout = now();

        $user->save();

        Auth::logout();
        return redirect()->to('/');
    }
}
