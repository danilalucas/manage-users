<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $userId = $this->route('id');

        return [
            'name'             => 'required|max:255|unique:users,name,'.$userId,
            'email'            => 'required|max:255|email|unique:users,email,'.$userId,
            'password'         => 'nullable|min:8|confirmed',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'      => __('The name field is required'),
            'name.max'           => __('Exceeded the 255 character limit'),
            'name.unique'        => __('Username already exists'),
            'email.required'     => __('The email field is mandatory'),
            'email.unique'       => __('User email already exists'),
            'email.max'          => __('Exceeded the 255 character limit'),
            'email.email'        => __('The email provided is not valid'),
            'password.required'  => __('The password field is mandatory'),
            'password.min'       => __('Minimum quantity of 8 characters'),
            'password.confirmed' => __('Password confirmation does not match'),       
        ];
    }

}
