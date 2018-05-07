<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Hesto\MultiAuth\Traits\LogsoutGuard;

use App\Product;
use Cart;
use Session;
use URL;

class LoginController extends Controller{

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    protected $redirectTo = '/';

    public function __construct(){
        $this->middleware('user.guest', ['except' => 'logout']);
    }

    public function showLoginForm(){
        $url_back = URL::previous();
        Session::put('url.intended', $url_back);
        return view('user.auth.login');
    }

    public function username(){
        return 'username';
    }

    protected function guard(){
        return Auth::guard('user');
    }

    protected function credentials(Request $request){
        $usernameInput = trim($request->{$this->username()});
        $usernameColumn = $this->username();

        return [$usernameColumn => $usernameInput, 'password' => $request->password, 'active' => 1];
    }

    protected function authenticated(Request $request, $user){
        foreach ($user->wishlists as $value) {

            $product = Product::find($value->products_id);

            $wishlist = Cart::instance('wishlist')->add($product->id, $product->title, 1, $product->price)->associate('Product');
        }

        $redirect = (Session::has('url.intended') ? Session::get('url.intended') : $this->redirectPath());

        return redirect()->intended($redirect);
    }

    protected function sendFailedLoginResponse(Request $request){
        return redirect('login')
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => Lang::get('auth.failed'),
            ]);
    }
}
