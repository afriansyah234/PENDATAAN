<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ClassroomRepository;
use App\Handler\NotFoundHandler;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ClassroomRequest;
use Exception;

class ClassroomController extends Controller
{
    protected ClassroomRepository $repo;
    protected NotFoundHandler $notFoundHandler;

    public function __construct(ClassroomRepository $repo, NotFoundHandler $notFoundHandler)
    {
        $this->repo = $repo;
        $this->notFoundHandler = $notFoundHandler;
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
            return ResponseHelper::error(message: $e->getMessage(),code:$e->getCode());
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
            return ResponseHelper::error(message: $e->getMessage(),code:$e->getCode());
        }
    }

    /**
     * Tampilkan detail kelas berdasarkan ID
     */
    public function show($id)
    {
        try {
            $classroom = $this->notFoundHandler->handleNotFound($id);
            return ResponseHelper::success('Detail kelas', $classroom);
        } catch (Exception $e) {
            return ResponseHelper::error(message: $e->getMessage(),code:$e->getCode());
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
            return ResponseHelper::success('Kelas berhasil diperbarui', $updated);
        } catch (Exception $e) {
            return ResponseHelper::error(message: $e->getMessage(),code:$e->getCode());
        }
    }

    /**
     * Hapus data kelas
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->repo->destroy($id);
            return ResponseHelper::success(null,'Kelas berhasil dihapus');
        } catch (Exception $e) {
            return ResponseHelper::error(message: $e->getMessage(),code:$e->getCode());
        }
    }
}
