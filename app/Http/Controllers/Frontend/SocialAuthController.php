<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserSocialAccount;
use App\User;
use App\Product;
use Cart;
use Socialite;
use App\Mail\RegisterMail;
use Mail;
use App\Notifications\ProductNotification;

class SocialAuthController extends Controller{
    public function redirectToProvider($social){
        try {
            return Socialite::driver($social)->redirect();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function handleProviderCallback($social){
        try {
            $user = Socialite::driver($social)->user();
            $new_user = $this->createOrGetUser($user, $social);

            if (is_array($new_user) && $new_user['id'] === 0) {
                return redirect('register')->withInput($new_user);
            } else {
                foreach ($new_user->wishlists as $value) {
                    $product = Product::find($value->products_id);

                    $wishlist = Cart::instance('wishlist')->add($product->id, $product->title, 1, $product->price)->associate('Product');
                }

                auth('user')->login($new_user);

                return redirect()->to('/');
            }

        } catch (\Exception $e) {
            dd($e);
        }

    }

    private function createOrGetUser($providerUser, $social){
        $account = UserSocialAccount::whereProvider($social)
        ->whereProviderUserId($providerUser->getId())
        ->first();

        if ($account) {
            return $account->user;
        } else {
            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                try {
                    $nombre = (is_null($providerUser->getNickname()) ? explode('@', $providerUser->getEmail())[0] : str_replace(' ', '_', $providerUser->getNickname()) );
                } catch (Exception $e) {
                    return redirect()->back();
                }

                $user = $providerUser->getRaw();

                if ($social == 'facebook') {
                    $user['first_name']       = $providerUser->getName();
                } elseif ($social == 'google') {
                    $user['first_name']       = $user['name']['givenName'];
                    $user['last_name']        = $user['name']['familyName'];
                    $user['email']            = $user['emails'][0]['value'];
                }

                $user['username']         = $nombre;
                $user['avatar']           = $providerUser->getAvatar();
                $user['provider_user_id'] = $providerUser->getId();
                $user['id']               = 0;
                $user['terms']            = 'on';
                $user['social']           = $social;

                return $user;
            } else {
                $account = new UserSocialAccount([
                    'provider_user_id' => $providerUser->getId(),
                    'provider'         => $social
                    ]);

                $account->user()->associate($user);
                $account->save();
            }

            return $user;
        }
    }

    public function mailchimp_register(Request $request){

        $exists = \Mailchimp::checkStatus('c9edb35756', $request->email);

        if ($exists == 'not found') {
            $register = \Mailchimp::subscribe('c9edb35756', $request->email, ['NOMBRES' => 'Sin Nombre', 'APELLIDOS' => 'Sin Apellido', 'USERNAME' => 'Sin nombre de usuario','CIUDAD'=>'Sin ciudad','BITHDAY'=>'08/11/2017'], true);

            \Session::flash('message', 'Su cuenta ha sido inscrita con nosotros, gracias por preferirnos');
        } else {
            \Session::flash('message-error', 'Su cuenta ya se encuentra inscrita con nosotros');
        }

        return redirect('/');
    }
}
