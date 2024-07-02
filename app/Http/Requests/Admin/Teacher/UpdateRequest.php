<?php

namespace App\Http\Requests\Admin\Teacher;

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
            'name' => 'nullable|string',
            'surname' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'course_id' => 'nullable|integer|exists:courses,id',
            'phone' => 'nullable|string',
            'major_tk' => 'nullable|string',
            'major_ru' => 'nullable|string',
            'major_en' => 'nullable|string',
            'experience_tk' => 'nullable|string',
            'experience_ru' => 'nullable|string',
            'experience_en' => 'nullable|string',
            'degree_tk' => 'nullable|string',
            'degree_ru' => 'nullable|string',
            'degree_en' => 'nullable|string',
            'hobby_tk' => 'nullable|string',
            'hobby_ru' => 'nullable|string',
            'hobby_en' => 'nullable|string',
            'address_tk' => 'nullable|string',
            'address_ru' => 'nullable|string',
            'address_en' => 'nullable|string',
        ];
    }

    public function messages()
    {
        $string = 'Data must comply with line mode';
        $image = 'Have to be an image, jpg-png-jpeg, max:2048';
        return [
            'name.string' => $string,
            'surname.string' => $string,
            'major.string' => $string,
            'experience.string' => $string,
            'degree.string' => $string,
            'image.image' => $image,
        ];
    }


}
