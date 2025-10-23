<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ClassroomRepository;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ClassroomRequest;
use Exception;

class ClassroomController extends Controller
{
    protected ClassroomRepository $repo;

    public function __construct(ClassroomRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Tampilkan semua data kelas
     */
    public function index()
    {
        try {
            $classrooms = $this->repo->get();
            return ResponseHelper::success('Daftar semua kelas', $classrooms);
        } catch (Exception $e) {
            return ResponseHelper::error('Gagal mengambil data kelas: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Form create (tidak digunakan di API)
     */
    public function create()
    {
        //
    }

    /**
     * Simpan data kelas baru
     */
    public function store(ClassroomRequest $request)
    {
        try {
            $validated = $request->validated();
            $classroom = $this->repo->store($validated);

            return ResponseHelper::success('Kelas berhasil dibuat', $classroom, 201);
        } catch (Exception $e) {
            return ResponseHelper::error('Gagal membuat kelas: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Tampilkan detail kelas berdasarkan ID
     */
    public function show($id)
    {
        try {
            $classroom = $this->repo->show($id);

            if (!$classroom) {
                return ResponseHelper::error('Kelas tidak ditemukan', 404);
            }

            return ResponseHelper::success('Detail kelas', $classroom);
        } catch (Exception $e) {
            return ResponseHelper::error('Gagal menampilkan detail kelas: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Form edit (tidak digunakan di API)
     */
    public function edit()
    {
        //
    }

    /**
     * Perbarui data kelas
     */
    public function update(ClassroomRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $updated = $this->repo->update($id, $validated);

            if (!$updated) {
                return ResponseHelper::error('Kelas tidak ditemukan', 404);
            }

            return ResponseHelper::success('Kelas berhasil diperbarui', $updated);
        } catch (Exception $e) {
            return ResponseHelper::error('Gagal memperbarui kelas: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Hapus data kelas
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->repo->destroy($id);

            if (!$deleted) {
                return ResponseHelper::error('Kelas tidak ditemukan', 404);
            }

            return ResponseHelper::success('Kelas berhasil dihapus');
        } catch (Exception $e) {
            return ResponseHelper::error('Gagal menghapus kelas: ' . $e->getMessage(), 500);
        }
    }
}
