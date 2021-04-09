<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'sku' => [
                'required',
                'max:45',
                Rule::unique(Product::class)->ignore($this->route('id')),
            ],
            'description' => ['required', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'sku.required' => 'O SKU é obrigatório',
            'sku.max' => 'O SKU é maior que 45 dígitos',
            'sku.unique' => 'SKU já existe',
            'description.required' => 'A descrição é obrigatória',
            'description.max' => 'A descrição é maior que 255 dígitos',
        ];
    }
}
