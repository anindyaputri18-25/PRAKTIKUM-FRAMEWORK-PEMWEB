<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHarvestRequest extends FormRequest
{
    // Izinkan semua user menggunakan request ini
    public function authorize(): bool
    {
        return true;
    }

    // Aturan validasi
    public function rules(): array
    {
        return [
            'commodity_name' => 'required|string|max:255',
            'quantity_kg'    => 'required|numeric|min:1',
            'harvest_date'   => 'nullable|date',
        ];
    }

    // Pesan error custom (opsional tapi lebih informatif)
    public function messages(): array
    {
        return [
            'commodity_name.required' => 'Nama komoditas wajib diisi',
            'quantity_kg.required'    => 'Berat kg wajib diisi',
            'quantity_kg.numeric'     => 'Berat kg harus berupa angka',
            'quantity_kg.min'         => 'Berat kg minimal 1',
        ];
    }
}