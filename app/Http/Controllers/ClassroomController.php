<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\ClassroomRequest;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return ResponseHelper::success('Daftar semua kelas', $classrooms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request)
    {

        $classroom = Classroom::create($request->validated());

        return ResponseHelper::success('Kelas berhasil dibuat', $classroom, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $classroom = Classroom::find($id);

        if (!$classroom) {
            return ResponseHelper::error('Kelas tidak ditemukan', 404);
        }

        return ResponseHelper::success('Detail kelas', $classroom);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $classroom = Classroom::find($id);

        if (!$classroom) {
            return ResponseHelper::error('Kelas tidak ditemukan', 404);
        }

        $validated = $request->validate([
            'name_classroom' => 'sometimes|required|string|max:255'
        ]);

        $classroom->update($validated);

        return ResponseHelper::success('Kelas berhasil diperbarui', $classroom);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classroom = Classroom::find($id);

        if (!$classroom) {
            return ResponseHelper::error('Kelas tidak ditemukan', 404);
        }

        $classroom->delete();

        return ResponseHelper::success('Kelas berhasil dihapus');
    }
}
