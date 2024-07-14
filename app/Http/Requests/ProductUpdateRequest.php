<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use function Symfony\Component\Translation\t;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'string|max:255',
            'sku' => 'string|max:8',
            'amount' => 'int|min:1',
            'price' => 'int|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'tags.*' => 'string|max:255',
        ];
    }
}
