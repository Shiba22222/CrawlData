<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'roles' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên tài khoản không được để trống',
            'email.required' => 'Email không được để trông',
            'password.required' => 'Mật khẩu không được để trống',
            'password.confirmed' => 'Mật khẩu và xác nhận mật khẩu không được khác nhau',
            'roles.required' => 'Role không được để trống'
        ];
    }
}
