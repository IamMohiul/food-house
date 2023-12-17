<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:8', 'confirmed'],
        ];
    }

    function messages() : array {
        return[
            'current_password.current_password'=> "The current password does not match the one we have registered!",
            'password.required'=>"New password field can not be empty.",
            'password.min'=>"Password must contain at least 8 characters.",
            'password.confirmed'=>"The new password confirmation does not match."
        ];
    }
}
