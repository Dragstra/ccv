<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Authenticatable $user){
        return view('profile', compact('user'));
    }
}
