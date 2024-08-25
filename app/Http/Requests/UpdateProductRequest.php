<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'exists:categories,id',
            'title' => 'min:3|max:100',
            'description' => 'min:3|max:500',
            'sku' => [
                'string',
                'size:8',
                'unique:products,sku,' . $this->id,
            ],
            'price' => 'numeric|min:0',
        ];
    }
}
