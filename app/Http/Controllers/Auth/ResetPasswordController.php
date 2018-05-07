<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller{
    use ResetsPasswords;

    public $redirectTo = '/home';

    public function __construct(){
        $this->middleware('user.guest');
    }

    public function showResetForm(Request $request, $token = null){
        return view('user.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function broker(){
        return Password::broker('users');
    }

    protected function guard(){
        return Auth::guard('user');
    }
}
