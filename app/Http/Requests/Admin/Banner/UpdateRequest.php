<?php

namespace App\Http\Requests\Admin\Banner;

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
            'news_tk' => 'nullable|string',
            'news_ru' => 'nullable|string',
            'news_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description_tk' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
        ];
    }

    public function messages()
    {
        $required = 'This field is required';
        $string = 'Data must comply with line mode';
        $image = 'Have to be an image, jpg-png-jpeg, max:2048';
        return [
            'title.required' => $required,
            'title.string' => $string,
            'news.required' => $required,
            'news.string' => $string,
            'description.required' => $required,
            'description.string' => $string,
            'image.required' => $required,
            'image.image' => $image,
        ];
    }


}
