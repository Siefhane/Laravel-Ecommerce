<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            
            'name'=>'required|unique:categories|min:5',
            'logo'=>'required'
        ];
    }

    function messages()
    {
      return[
        'name.required'=>"Category must have name",
        'logo.required'=>"Category must have logo",
        'name.min'=>'Category name should be at least 5 chars'
      ];
    }
}
