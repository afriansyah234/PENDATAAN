<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntershipsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Tell it like it is: kalau belum pakai policy, true dulu
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teachers,id',
            'company_id' => 'required|exists:companies,id',

            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',

            'status' => 'required|in:aktif,selesai,batal',

            'catatan_guru' => 'nullable|string',

            'laporan_pkl' => 'required|in:selesai,belum',
        ];
    }
}
