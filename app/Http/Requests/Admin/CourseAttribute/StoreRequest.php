<?php

namespace App\Http\Requests\Admin\CourseAttribute;

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
            'stage_tk' => 'required|string',
            'stage_ru' => 'required|string',
            'stage_en' => 'required|string',
            'description_tk' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'course_id' => 'required|integer|exists:courses,id',
        ];

//        foreach(config('app.available_locales') as $locale)
//        {
//            $rules['stage_' . $locale] = 'string';
//        }
//        return $rules;
    }

    public function messages()
    {
        $required = 'This :attribute field is required';
        $string = 'This :attribute data must comply with line mode';
        return [
            'stage.required' => $required,
            'stage.string' => $string,
            'description.required' => $required,
            'description.string' => $string,
            'course_id.required' => $required,
        ];
    }
}
