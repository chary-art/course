<?php

namespace App\Http\Requests\Admin\CourseAttribute;

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
            'stage_tk' => 'nullable|string',
            'stage_ru' => 'nullable|string',
            'stage_en' => 'nullable|string',
            'description_tk' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'course_id' => 'required|integer|exists:courses,id',
        ];
    }

    public function messages()
    {
        $string = 'This :attribute data must comply with line mode';
        return [
            'stage.string' => $string,
            'description.string' => $string,
        ];
    }


}
