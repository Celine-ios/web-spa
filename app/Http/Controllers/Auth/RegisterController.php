<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserSocialAccount;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\RegisterMail;
use Mail;
use Mailchimp;


class RegisterController extends Controller{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct(){
        $this->middleware('user.guest');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'username'   => 'required|max:255|unique:users',
            'email'      => 'required|email|max:255|unique:users',
            'email'      => 'required|email|max:255|unique:users',
            'password'   => 'required|min:6|confirmed',
            'birthday'   => 'required|date|before:tomorrow',
            'city'       => 'required|max:255',
            ]);
    }

    protected function create(array $data)
    {
        if (null !== $data['avatar'] && !empty($data['avatar'])) {
            $avatar = file_get_contents($data['avatar']);
            if ($avatar) {
                file_put_contents(public_path('images/users/').$data['username'].'.jpg', $avatar);
                $data['avatar'] = $data['username'].'.jpg';
            }
        }
        $exists = \Mailchimp::checkStatus('c9edb35756', $data['email']);
        if ($exists == 'not found') {
            $register = \Mailchimp::subscribe('c9edb35756', $data['email'], ['NOMBRES' => $data['first_name'], 'APELLIDOS' => $data['last_name'], 'USERNAME' => $data['username'],'CIUDAD'=>$data['city'],'BITHDAY'=>$data['birthday']], true);
        }
        $user = User::create($data);

        if (null !== $data['social'] && !empty($data['avatar'])) {
            $account = UserSocialAccount::whereProvider($data['social'])
            ->whereProviderUserId($data['provider_user_id'])
            ->first();

            if(!$account){
                $account = new UserSocialAccount([
                    'provider_user_id' => $data['provider_user_id'],
                    'provider'         => $data['social']
                ]);
            } 

            $account->user()->associate($user);
            $account->save();
        }

        return $user;
    }

    public function showRegistrationForm(){
        return view('user.auth.register');
    }

    protected function guard(){
        return Auth::guard('user');
    }

    protected function registered(Request $request, $user){
        $mail = Mail::to($user->email)->send(new RegisterMail($user));
    }
}
