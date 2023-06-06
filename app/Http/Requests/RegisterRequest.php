<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return
            [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:25',
            'password' => 'required|min:6',
            'phone' => 'required|max:10',
////            'password_confirmation' => 'required|same:password'
        ];
    }
}
