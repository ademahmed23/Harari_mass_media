<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'background' => ['nullable', 'image', 'max:3000'],
            'title' => ['required', 'max:255'],
            'sub_title' => ['required', 'max:255']
        ];
    }
}
