<?php

namespace App\Contracts\Repositories;

use App\Models\Classroom;

class ClassroomRepository extends BaseRepository
{
    /**
     * Ambil semua data Classroom
     */
    public function get(): mixed
    {
        return Classroom::all();
    }

    /**
     * Ambil data berdasarkan ID
     */
    public function show(mixed $id):mixed
    {
        return Classroom::find($id);
    }

    /**
     * Simpan data baru
     */
    public function store(array $data): mixed
    {
        return Classroom::create($data);
    }

    /**
     * Update data berdasarkan ID
     */
    public function Update(mixed $id, array $data): mixed
    {
        $classroom = Classroom::find($id);
        if (!$classroom) {
            return null;
        }

        $classroom->update($data);
        return $classroom;
    }

    /**
     * Hapus data berdasarkan ID
     */
    public function destroy(mixed $id): mixed
    {
        $classroom = Classroom::find($id);
        if (!$classroom) {
            return false;
        }

        return $classroom->delete();
    }
}
