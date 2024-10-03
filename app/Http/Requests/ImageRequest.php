<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
        $routeId = $this->route('image');

        return [
            'name' => 'required|min:3|unique:images,name,' . $routeId . ',uuid',
            'description' => 'required|min:3',
            'file' => $this->method() == 'POST' ? 'nullable|image|mimetypes:image/jpeg,image/png,image/gif,image/svg,image/jpg|mimes:jpeg,png,gif,svg,jpg|max:2048' : 'nullable|image|mimetypes:image/jpeg,image/png,image/gif,image/svg,image/jpg|mimes:jpeg,png,gif,svg,jpg|max:2048'
        ];
    }
}
