<?php

namespace App\Http\Requests\Cdc;

use Illuminate\Foundation\Http\FormRequest;

/**
 * CDC Event Registration Request
 * 
 * Validates data for registering to a CDC event
 */
class EventRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Public can register
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s()]+$/'],
            'nim' => ['required', 'string', 'max:50'],
            'message' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'nama lengkap',
            'email' => 'email',
            'phone' => 'nomor telepon',
            'nim' => 'NIM',
            'message' => 'pesan',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'phone.regex' => 'Format nomor telepon tidak valid.',
            'message.max' => 'Pesan maksimal 1000 karakter.',
        ];
    }
}
