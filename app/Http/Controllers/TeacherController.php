<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\TeacherRepository;
use App\Handler\NotFoundHandler;
use App\Helpers\ResponseHelper;
use App\Http\Requests\TeacherRequest;
use App\Http\Resources\TeacherResource;
use Exception;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected TeacherRepository $repo;
    protected NotFoundHandler $notFoundHandler;

    public function __construct(TeacherRepository $repo, NotFoundHandler $notFoundHandler)
    {
        $this->repo = $repo;
        $this->notFoundHandler = $notFoundHandler;
    }

    /**
     * Tampilkan semua data guru
     */
    public function index(Request $request)
    {
        try {
            $teachers = $this->repo->get();

            if ($this->wantsJson($request)) {
                return ResponseHelper::success(
                    'Daftar semua guru',
                    TeacherResource::collection($teachers)
                    
                );
            }

            return view('teachers.index', compact('teachers'));
        } catch (Exception $e) {
            return ResponseHelper::error(message: $e->getMessage(), code: $e->getCode());
        }
    }

    /**
     * Form create (tidak digunakan di API)
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Simpan data guru baru
     */
    public function store(TeacherRequest $request)
    {
        try {
            $teacher = $this->repo->store($request->validated());

            if ($this->wantsJson($request)) {
                return ResponseHelper::success(
                    'Guru berhasil ditambahkan',
                    new TeacherResource($teacher),
                    201
                );
            }

            return redirect()->route('teachers.index')->with('success', 'Guru berhasil ditambahkan');
        } catch (Exception $e) {
            return ResponseHelper::error(message: $e->getMessage(), code: $e->getCode());
        }
    }

    /**
     * Tampilkan detail guru berdasarkan ID
     */
    public function show(Request $request, $id)
    {
        try {
            $teacher = $this->notFoundHandler->handleNotFound($id);

            if ($this->wantsJson($request)) {
                return ResponseHelper::success('Detail guru', new TeacherResource($teacher));
            }

            return view('teachers.show', compact('teacher'));
        } catch (Exception $e) {
            if ($this->wantsJson($request)) {
                return ResponseHelper::error(message: $e->getMessage(), code: $e->getCode());
            }

            return redirect()->route('teachers.index')->with('error', 'Guru tidak ditemukan');
        }
    }

    /**
     * Form edit (tidak digunakan di API)
     */
    public function edit($id)
    {
        try {
            $teacher = $this->repo->show($id);
            return view('teachers.edit', compact('teacher'));
        } catch (Exception $e) {
            return redirect()->route('teachers.index')->with('error', 'Guru tidak ditemukan');
        }
    }

    /**
     * Perbarui data guru
     */
    public function update(TeacherRequest $request, $id)
    {
        try {
            $updated = $this->repo->update($id, $request->validated());

            if ($this->wantsJson($request)) {
                return ResponseHelper::success(
                    'Guru berhasil diperbarui',
                    new TeacherResource($updated)
                );
            }

            return redirect()->route('teachers.index')->with('success', 'Guru berhasil diperbarui');
        } catch (Exception $e) {
            if ($this->wantsJson($request)) {
                return ResponseHelper::error(message: $e->getMessage(), code: $e->getCode());
            }

            return redirect()->route('teachers.index')->with('error', 'Gagal memperbarui guru: ' . $e->getMessage());
        }
    }

    /**
     * Hapus data guru
     */
    public function destroy(Request $request, $id)
    {
        try {
            $this->repo->destroy($id);

            if ($this->wantsJson($request)) {
                return ResponseHelper::success(null, 'Guru berhasil dihapus');
            }

            return redirect()->route('teachers.index')->with('success', 'Guru berhasil dihapus');
        } catch (Exception $e) {
            if ($this->wantsJson($request)) {
                return ResponseHelper::error(message: $e->getMessage(), code: $e->getCode());
            }

            return redirect()->route('teachers.index')->with('error', 'Gagal menghapus guru: ' . $e->getMessage());
        }
    }

    /**
     * Cek apakah request datang dari API atau Web
     */
    protected function wantsJson(Request $request)
    {
        return $request->is('api/*');
    }
}
