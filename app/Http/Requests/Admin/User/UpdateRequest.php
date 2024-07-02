<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'string',
            'surname' => 'nullable|string',
            'email' => 'nullable|email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable',
            'role_id' => 'nullable',
        ];
    }

    public function messages()
    {
        $string = 'Data must comply with line mode';
        $image = 'Have to be an image, jpg-png-jpeg, max:2048';
        $email = "email: value must be a valid email address.";
        return [
            'image.image' => $image,
            'name.string' => $string,
            'surname.string' => $string,
            'email.email' => $email,
        ];
    }

}
