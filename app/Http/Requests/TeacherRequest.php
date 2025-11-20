<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
    $teacherId = $this->route('teacher'); // ambil id dari route model binding

    return [
        "user_id" => [
            $this->isMethod('post') ? 'required' : 'sometimes',
            'exists:users,id'
        ],

        "nip" => [
            $this->isMethod('post') ? 'required' : 'sometimes',
            'integer',
            'unique:teachers,nip,' . $teacherId
        ],

        "no_telepon" => "nullable|string"
    ];
}

}
