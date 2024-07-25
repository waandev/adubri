<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComplaintRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date_of_incident' => 'required|date|before_or_equal:today',
            'description' => 'required|string',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    /**
     * Get the custom messages for the validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'name.string' => 'Nama harus berupa string.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'date_of_incident.required' => 'Tanggal kejadian harus diisi.',
            'date_of_incident.date' => 'Tanggal kejadian harus berupa tanggal yang valid.',
            'date_of_incident.before_or_equal' => 'Tanggal kejadian tidak boleh melebihi hari ini.',
            'description.required' => 'Deskripsi harus diisi.',
            'description.string' => 'Deskripsi harus berupa string.',
            'g-recaptcha-response.required' => 'Silakan centang reCAPTCHA.',
            'g-recaptcha-response.captcha' => 'Captcha tidak valid, silakan coba lagi.',
        ];
    }
}
