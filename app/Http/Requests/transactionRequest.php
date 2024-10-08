<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class transactionRequest extends FormRequest
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
            'type' => 'required|in:table,events',
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required|min:3',
            'date' => 'required|date',
            'time' => 'required|time',
            'people' => 'required|numeric',
            'status' => 'required',
            'file' => 'mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
