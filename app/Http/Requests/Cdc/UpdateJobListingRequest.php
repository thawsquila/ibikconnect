<?php

namespace App\Http\Requests\Cdc;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Update Job Listing Request
 * 
 * Validates data for updating an existing job listing
 */
class UpdateJobListingRequest extends FormRequest
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
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'company_name' => ['sometimes', 'required', 'string', 'max:255'],
            'company_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'location' => ['sometimes', 'required', 'string', 'max:255'],
            'type' => ['sometimes', 'required', 'in:full-time,part-time,internship,freelance,contract'],
            'salary_range' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'requirements' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
            'deadline' => ['nullable', 'date', 'after:today'],
            'application_url' => ['nullable', 'url', 'max:255'],
            'is_active' => ['boolean'],
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
            'title' => 'judul posisi',
            'company_name' => 'nama perusahaan',
            'company_logo' => 'logo perusahaan',
            'location' => 'lokasi',
            'type' => 'tipe pekerjaan',
            'salary_range' => 'range gaji',
            'description' => 'deskripsi',
            'requirements' => 'persyaratan',
            'benefits' => 'benefit',
            'deadline' => 'batas waktu',
            'application_url' => 'link pendaftaran',
        ];
    }
}
