<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtUser' => 'required|unique:users,name',
            'txtPass' => 'required',
            'txtRePass' => 'required|same:txtPass',
            'txtEmail' => 'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/'
        ];
    }
    public function messages()
    {
        return [
            'txtUser.required' => 'Please enter User',
            'txtUser.unique' => 'Username haved uses',
            'txtPass.required' => 'Please enter passwords',
            'txtRePass.required' => 'Please enter Repasswords',
            'txtRePass.same' => 'Password no duplicate',
            'txtEmail.required' => 'Please enter Email',
            'txtEmail.regex' => 'Email fail'
        ];
    }
}
