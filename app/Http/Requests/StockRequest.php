<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StockRequest extends FormRequest
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
                Rule::exists(Product::class)->whereNull('deleted_at')
            ],
            'amount' => [
                'required',
                'integer',
                'min:1'
            ]
        ];
    }

    public function messages()
    {
        return [
            'sku.required' => 'O SKU é obrigatório',
            'sku.exists' => 'SKU não encontrado',
            'amount.required' => 'A quantidade é obrigatória',
            'amount.integer' => 'A quantidade deve ser um número inteiro',
            'amount.min' => 'A quantidade não pode ser menor que :min'
        ];
    }
}
