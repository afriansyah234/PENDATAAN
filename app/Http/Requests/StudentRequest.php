<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
    // Ambil ID student dari route
    // Bisa dari route model binding atau dari {id}
    $student = $this->route('student') ?? $this->route('id');
    $studentId = is_object($student) ? $student->id : $student;

    // Tentukan required atau sometimes
    $required = $this->isMethod('post') ? 'required' : 'sometimes';

    return [
        'nama_siswa'   => [$required, 'string', 'max:100'],

        'nis'          => [
            $required,
            'string',
            'unique:students,nis,' . $studentId
        ],

        'teachers_id'  => [$required, 'exists:teachers,id'],

        'gender'       => [$required, 'in:L,P'],

        'classroom_id' => [$required, 'exists:classrooms,id'],

        'jurusan'      => [$required, 'string'],

        'email'        => [
            $required,
            'email',
            'unique:students,email,' . $studentId
        ],

        // integer + max di integer itu salah → max membandingkan nilai, bukan panjang
        'phone_number' => ['nullable', 'string', 'max:20'],

        'alamat'       => ['nullable', 'string'],
    ];
}

}
