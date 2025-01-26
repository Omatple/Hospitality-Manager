<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            "first_name" => ["required", "string", "min:3", "max:16", Rule::unique("users", "first_name")->where(function ($query) {
                $query->where("last_name", $this->last_name);
            })->ignore($this->route("user"))],
            "last_name" => ["required", "string", "min:3", "max:32"],
            "email" => ["required", "email", Rule::unique("users", "email")->ignore($this->route("user"))],
            "password" => [$this->isMethod("POST") ? "required" : "nullable", "string", "min:8", "max:32"],
            "image" => ["nullable", "image", "max:2048"],
            "role" => ["required", "string", Rule::in(['waiter', 'bartender', 'barista'])],
        ];
    }

    public function messages(): array
    {
        return [
            "first_name.unique" => ["The combination of first name and last name already exists."],
        ];
    }
}
