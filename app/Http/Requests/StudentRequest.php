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
        return [
            'name_student' => 'required|string|max:100',
            'nis'=>'required|unique:nis',
            'gender'=>'required',
            'classroom_id'=>'required',
            'major'=>'required|string',
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'nullable|integer|max:20',
            'address'=> 'nullable'
        ];
    }
}
