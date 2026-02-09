<?php

namespace App\Http\Requests\Cdc;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Store CDC Event Request
 * 
 * Validates data for creating a new CDC event
 */
class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() && $this->user()->isCdcAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'start_date' => ['required', 'date', 'after:now'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
            'location' => ['required', 'string', 'max:255'],
            'event_type' => ['nullable', 'string', 'max:255'],
            'max_participants' => ['nullable', 'integer', 'min:1'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'requirements' => ['nullable', 'string'],
            'is_published' => ['boolean'],
            'is_registration_open' => ['boolean'],
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
            'title' => 'judul event',
            'description' => 'deskripsi',
            'start_date' => 'tanggal mulai',
            'end_date' => 'tanggal selesai',
            'location' => 'lokasi',
            'event_type' => 'tipe event',
            'max_participants' => 'kapasitas maksimal',
            'banner_image' => 'banner',
            'requirements' => 'persyaratan',
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
            'start_date.after' => 'Tanggal mulai harus setelah sekarang.',
            'end_date.after' => 'Tanggal selesai harus setelah tanggal mulai.',
            'banner_image.max' => 'Ukuran banner maksimal 3MB.',
        ];
    }
}
