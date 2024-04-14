<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'user_name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'phone' => 'digits:10',
            'address' => 'string',
            'image' => 'required|mimes:jpg,jpeg,png'
        ];
    }
    public function messages(){
        [
            'user_name.required' => 'Username is required.',
            'user_name.min' => 'Username must be at least :min characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.unique' => 'Email has already been taken.',
            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a string.',
            'password.min' => 'Password must be at least :min characters.',
            'password.regex' => 'Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.',
            'phone.digits' => 'Phone must be exactly :digits digits.',
            'address.string' => 'Address must be a string.',
            'image.required' => 'Please choose an image file.',
            'image.mimes' => 'The image file must be in jpg, jpeg, or png format.',
        ];
    }
}
