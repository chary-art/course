<?php

namespace App\Http\Requests\Admin\Event;

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
            'title_tk' => 'required|string',
            'title_ru' => 'required|string',
            'title_en' => 'required|string',
            'description_tk' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        $required = 'This :attribute field is required';
        $string = 'This :attribute data must comply with line mode';
        $image = 'Have to be an image, jpg-png-jpeg, max:2048';
        return [
            'title.required' => $required,
            'title.string' => $string,
            'description.required' => $required,
            'description.string' => $string,
            'image.image' => $image,
        ];
    }

}
