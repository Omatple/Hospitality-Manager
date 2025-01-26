<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            "name" => ["required", "string", "min:3", "max:32", Rule::unique("products", "name")->ignore($this->route("product"))],
            "description" => ["nullable", "string", "min:10", "max:250"],
            "price" => ["required", "numeric", "regex:/^\d{1,2}(\.\d{1,2})?$/", "min:0.1", "max:99.99"],
            "image" => ["nullable", "image", "max:2048"],
            "stock" => ["nullable", "integer", "min:0", "max:999"],
            "category_id" => ["required", "string", Rule::in(Category::pluck("id")->toArray())],
        ];
    }
}
