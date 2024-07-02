<?php

namespace App\Http\Requests\Admin\Banner;

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
            'news_tk' => 'required|string',
            'news_ru' => 'required|string',
            'news_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description_tk' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
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
