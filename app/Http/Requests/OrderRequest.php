<?php

namespace App\Http\Requests;

use App\Models\Table;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
            "table_id" => ["required", "string", Rule::in(Table::pluck("id")->toArray())],
            "user_id" => ["required", "string", Rule::in(User::pluck("id")->toArray())],
        ];
    }
}
