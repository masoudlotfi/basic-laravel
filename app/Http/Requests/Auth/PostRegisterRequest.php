<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class PostRegisterRequest extends Request
{

    public function all()
    {
        $request = parent::all();
        return $request;
    }
    /**
     * Determine if the user is authorized to make this getRequest.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the getRequest.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'email' => 'required',
        ];
    }

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'ایمیل را پر نمایید.',
        ];
    }

}
