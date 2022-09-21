<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class LoginAccountRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => [
                'string',
                'max:255',
                'email',
            ],
            'password' => [
                'required',
                'string',
                'max:255',
            ],
            'user_name' => [
                'string',
                'max:255',
            ]
        ];
    }
}
