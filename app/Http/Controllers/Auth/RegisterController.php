<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Socials;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Socialite;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:50|unique:users',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
            'fullname' => 'required|max:50',
            'birthday' => 'required',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'fullname' => $data['fullname'],
            'birthday' => $data['birthday'],
        ]);
    }


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {

        try {

            $socialUser = Socialite::driver($provider)->user();

        } catch (\Exception $e) {
            
            return redirect('/');
        }
        $socialProvider = Socials::Where('provider_user_id',$socialUser->getId())->first();
        if (!$socialProvider) {

            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                ['username' => $socialUser->getNickname()],
                ['fullname' => $socialUser->getName()]
            );
            
            $user->socialProviders()->Create(
                ['provider_user_id' => $socialUser->getId(), 'provider' => $provider]
            );
        }
        else
            $user = $socialProvider->user;

        auth()->login($user);

        return redirect('/');
    }
}