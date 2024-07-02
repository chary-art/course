<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required',
        ];
    }

    public function messages()
    {
        $required = 'This :attribute field is required';
        $string = 'Data must comply with line mode';
        $image = 'Have to be an image, jpg-png-jpeg, max:2048';
        $email = "email: value must be a valid email address.";
        return [
            'image.image' => $image,
            'image.required' => $required,
            'name.string' => $string,
            'name.required' => $required,
            'surname.required' => $required,
            'surname.string' => $string,
            'email.required' => $required,
            'email.email' => $email,
            'password.required' => $required,
            'role_id' => $required,
        ];
    }
}
