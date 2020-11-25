<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'username' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:3',
            'address' => 'required',
            'group_id' => 'required',
            'roles' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Truong nay bat buoc'
        ];
    }
}
