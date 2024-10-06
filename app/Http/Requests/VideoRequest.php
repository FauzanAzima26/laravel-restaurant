<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'title' => 'required|min:3|unique:videos,title,' . $this->route('video') . ',uuid',
            'description' => 'required|min:3',
            'video' => $this->method() == 'POST' ? 'required|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:51200' : 'nullable|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:51200'
        ];
    }
}
