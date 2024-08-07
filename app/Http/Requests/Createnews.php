<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Createnews extends FormRequest
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
            'title'=>['min:3','max:40','required'],
            'body'=>['min:10','required'],
            'category_id'=>['required','exists:App\Models\Categories,id'],
            'link'=>['required','image']
        ];
    }
}

