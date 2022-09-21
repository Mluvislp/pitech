<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\RegisterAccount;
class RegisterAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                'required',
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
                'required',
                'string',
                'max:255',
            ],
            'user_role' => [
                'integer',
            ],
            'user_status' => [
                'integer',
            ]
        ];
    }
}
