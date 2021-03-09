<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileRequest;
use Illuminate\Contracts\Auth\Authenticatable;

class UserController extends Controller
{
    public function profile(Authenticatable $user)
    {
        return view('profile', compact('user'));
    }

    public function saveProfile(ProfileRequest $details, Authenticatable $user)
    {
        $user->name = $details->name;
        $user->email = $details->email;
        $user->company->domain = rtrim($details->domain,'/');
        $user->company->category = $details->category;
        $user->company->public_key = $details->public;
        $user->company->private_key = $details->private;
        $user->update();
        $user->company->update();
        return redirect()->route('profile');
    }

}
