<?php

namespace App\Http\Requests\Admin\Course;

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
            'course_tk' => 'required|string',
            'course_ru' => 'required|string',
            'course_en' => 'required|string',
        ];
    }

    public function messages()
    {
        $required = 'This :attribute field is required';
        $string = 'This :attribute data must comply with line mode';
        return [
            'course.required' => $required,
            'course.string' => $string,
        ];
    }
}
