<?php

namespace App\Http\Requests\Admin\Teacher;

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
            'name' => 'required|string',
            'surname' => 'required|string',
            'course_id' => 'required|integer|exists:courses,id',
            'phone' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'major_tk' => 'required|string',
            'major_ru' => 'required|string',
            'major_en' => 'required|string',
            'experience_tk' => 'required|string',
            'experience_ru' => 'required|string',
            'experience_en' => 'required|string',
            'degree_tk' => 'required|string',
            'degree_ru' => 'required|string',
            'degree_en' => 'required|string',
            'hobby_tk' => 'required|string',
            'hobby_ru' => 'required|string',
            'hobby_en' => 'required|string',
            'address_tk' => 'nullable|string',
            'address_ru' => 'nullable|string',
            'address_en' => 'nullable|string',
        ];
    }

    public function messages()
    {
        $required = 'This field is required';
        $string = 'Data must comply with line mode';
        $image = 'Have to be an image, jpg-png-jpeg, max:2048';
        return [
            'name.required' => $required,
            'name.string' => $string,
            'surname.required' => $required,
            'surname.string' => $string,
            'major.required' => $required,
            'major.string' => $string,
            'experience.required' => $required,
            'experience.string' => $string,
            'address.string' => $string,
            'degree.required' => $required,
            'degree.string' => $string,
            'course_id.required' => $required,
            'image.image' => $image,
        ];
    }
}
