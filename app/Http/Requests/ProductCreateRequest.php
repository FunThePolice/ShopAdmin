<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:8|unique:products',
            'amount' => 'required|int|min:1',
            'price' => 'required|int|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tags.*' => 'required|string|max:255',
        ];
    }
}
