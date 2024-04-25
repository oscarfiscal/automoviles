<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'identification' => 'required|string',
            'departament' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:clients,email',
            'accept_data_processing' => 'boolean',
        ];
    }
}
