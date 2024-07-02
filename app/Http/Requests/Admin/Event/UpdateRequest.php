<?php

namespace App\Http\Requests\Admin\Event;

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
            'title_tk' => 'nullable|string',
            'title_ru' => 'nullable|string',
            'title_en' => 'nullable|string',
            'description_tk' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        $string = 'This :attribute data must comply with line mode';
        $image = 'Have to be an image, jpg-png-jpeg, max:2048';
        return [
            'title.string' => $string,
            'description.string' => $string,
            'image.image' => $image,
        ];
    }
}
