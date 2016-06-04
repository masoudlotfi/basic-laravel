<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\PostRegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

//    public function showRegistrationForm()
//    {
//        Flash::message('خوش آمدید.');
//        return view('auth.register');
//    }
//
//    /**
//     * Handle a registration getRequest for the application.
//     * login removed from original action and email verification
//     *
//     * @param PostRegisterRequest $request
//     * @param bool $isJson
//     * @return \Illuminate\Http\Response
//     * @throws \Illuminate\Foundation\Validation\ValidationException
//     */
//    public function postRegister(PostRegisterRequest $request)
//    {
//        $input = $request->all();
//
//        $input['email'] = strtolower($input['email']);
//        $user = $this->create($input);
//
//        Flash::info('باتشکر از ثبت‌نام شما، لطفاً برای ورود به سیستم اقدام نمایید.');
//
//        return Redirect::action('Auth\AuthController@getLogin');
//    }
//
//    public function getLogout()
//    {
//        Auth::guard($this->getGuard())->logout();
//        session()->flush();
//        return redirect()->back();
//    }
//
//
//    /**
//     * Get a validator for an incoming registration request.
//     *
//     * @param  array  $data
//     * @return \Illuminate\Contracts\Validation\Validator
//     */
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6|confirmed',
//        ]);
//    }
//
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'mobile' => $data['mobile'],
            'postal_code' => $data['postal_code'],
            'password' => bcrypt($data['password']),
        ];

        return User::create($user);
    }
}
