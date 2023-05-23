<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreSignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"      => "string|max:255",
            "email"     => "required|string|email",
            "password"  => "required|min:6",
        ];
    }
}
