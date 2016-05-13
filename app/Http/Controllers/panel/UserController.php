<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use Cache;
use Carbon\Carbon;
use Flash;
use Illuminate\Support\Facades\Hash;
use Queue;
use Redirect;
use Validator;

class UserController extends Controller
{
    /**
     * view for change password
     *
     * @return Response
     */
    public function getChangePassword()
    {
        $user = Auth::user();

        return view('panel.user.change_password', compact('user'));
    }

    /**
     * save for change password
     *
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $input = $request->only([
            'password',
            'new_password',
        ]);
        if (Hash::check($input['password'], $user->password)) {
            $user->password = Hash::make($input['new_password']);

            if (Auth::user()->save()) {
                Flash::success(trans('user.updatePassSuccess'));

                return Redirect::route('panel.dashboard.getIndex');
            }
        }

        return Redirect::route('panel.user.postChangePassword')
            ->withErrors(['password' => trans('user.wrongPass')]);
    }
}
