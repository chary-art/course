<?php

namespace App\Http\Requests\Admin\Video;

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
            'title_tk' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            // 'video' => 'required|file|mimetypes:video/mp4',
            'video' => 'required|file|mimes:m4a,mp4,mp3,asf',
            // 'video' => 'required|file|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv |max:20000',
            // 'video' => 'required|file|mimes:mp4,ogx,oga,ogv,ogg,webm',
            // 'video' => 'required|file|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            'teacher_id' => 'required',
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
            'video.required' => $required,
            'teacher_id.required' => $required,
        ];
    }
}
