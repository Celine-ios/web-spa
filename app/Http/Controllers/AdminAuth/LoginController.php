<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;

class LoginController extends Controller{

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    public $redirectTo   = '/admin/home';

    public function __construct(){
        $this->middleware('admin.guest', ['except' => 'logout']);
    }

    public function showLoginForm(){
        return view('admin.auth.login');
    }

    public function username(){
        return 'username';
    }

    protected function guard(){
        return Auth::guard('admin');
    }

    protected function credentials(Request $request){
        $usernameInput  = trim($request->{$this->username()});
        $usernameColumn = $this->username();

        return [$usernameColumn => $usernameInput, 'password' => $request->password, 'active' => 1];
    }

    protected function validateLogin(Request $request){
        $validator = \Validator::make($request->all(), [
            $this->username() => 'required',
            'password'        => 'required'
        ]);

        if ($validator->fails()) {
            toast()->error('Debes ingresar las credenciales', 'Error en el Acceso');
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function logout(Request $request){
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('admin');
    }


    protected function sendFailedLoginResponse(Request $request){
        if ($request->has('username') && $request->has('password')) {
            toast()->error('Estas credenciales no coinciden con nuestros registros', 'Error en el Acceso');
        }
        return redirect()->back();
    }
}
