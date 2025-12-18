<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\ClassRoomResource;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function index(Request $request)
    {
        $search = $request->query('search');

    $students = Student::with(['classroom', 'teacher'])
        ->when($search, function ($query, $search) {
            $query->where('nama_siswa', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%")
                  ->orWhere('jurusan', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('no_telp', 'like', "%{$search}%");
        })
        ->get();

    return ResponseHelper::success(
        StudentResource::collection($students),
        'Daftar siswa berhasil diambil'
    );
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
    public function store(StudentRequest $request)
    {

        $student = Student::create($request->validated());

         return ResponseHelper::success('Kelas berhasil dibuat', $student, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::find($id);

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
    public function update(StudentRequest $request, $id)
{
    $student = Student::findOrFail($id);

    $student->update($request->validated());

    return ResponseHelper::success($student, 'Data siswa berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();

        return ResponseHelper::success(null, 'Data siswa berhasil dihapus');
    }


}

