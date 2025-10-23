<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return ResponseHelper::success($students, 'Daftar siswa berhasil diambil');
    }

    /**
     * Show the form for creating a new resource.
     * (Not used in API)
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            
        ]);

        $student = Student::create($validated);

        return e($student, 'Data siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return ResponseHelper::error('Data siswa tidak ditemukan', 404);
        }

        return ResponseHelper::success($student, 'Detail siswa berhasil diambil');
    }

    /**
     * Show the form for editing the specified resource.
     * (Not used in API)
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return ResponseHelper::error('Data siswa tidak ditemukan', 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:100',
            'email' => 'sometimes|email|unique:students,email,' . $id,
            'phone' => 'nullable|string|max:20',
        ]);

        $student->update($validated);

        return ResponseHelper::success($student, 'Data siswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return ResponseHelper::error('Data siswa tidak ditemukan', 404);
        }

        $student->delete();

        return ResponseHelper::success(null, 'Data siswa berhasil dihapus');
    }
}
