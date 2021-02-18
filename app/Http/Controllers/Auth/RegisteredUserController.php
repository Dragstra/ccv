<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param Request $request
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:6',
                'company_name' => 'required|string|max:255',
                'company_domain' => 'required|string|max:255',
            ]
        );

        $companyId = Company::where(
            [
                'name' => $request->company_name
            ]
        )->first();

        if (!$companyId) {
            $companyId = Company::create(
                [
                    'name' => $request->company_name,
                    'domain' => rtrim($request->company_domain,'/'),
                    'public_key' => null,
                    'private_key' => null
                ]
            );
        }

        Auth::login(
            $user = User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'company_id' => $companyId->id,
                    'password' => Hash::make($request->password),
                ]
            )
        );

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
