<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function logOut()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }
}
