<?php

namespace App\Http\Requests\Admin\Course;

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
            'course_tk' => 'nullable|string',
            'course_ru' => 'nullable|string',
            'course_en' => 'nullable|string',
        ];
    }

    public function messages()
    {
        $string = 'This :attribute data must comply with line mode';
        return [
            'course.string' => $string,
        ];
    }
}
