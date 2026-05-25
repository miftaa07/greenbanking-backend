<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'organisasi' => 'nullable|string|max:255',
            'pesan'      => 'required|string|max:5000',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'  => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email'    => 'Format email tidak valid',
            'pesan.required' => 'Pesan wajib diisi',
        ];
    }
}
