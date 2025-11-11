<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ClassroomRepository;
use App\Handler\NotFoundHandler;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ClassroomRequest;
use App\Http\Resources\ClassRoomResource;
use Exception;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        try {
            $classrooms = $this->repo->get();
            if($this->wantsJson($request)) {
            return ResponseHelper::success( ClassRoomResource::collection($classrooms),'Daftar semua kelas');
        }
        return view('classrooms.index',compact('classrooms'));
    }catch (Exception $e) {
            return ResponseHelper::error(message: $e->getMessage(),code:$e->getCode());
        }
    }

    /**
     * Form create (tidak digunakan di API)
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Simpan data kelas baru
     */
    public function store(ClassroomRequest $request)
    {
        try {
            $classroom = $this->repo->store($request->validated());
            if ($this->wantsJson($request)) {
                return ResponseHelper::success('Kelas berhasil dibuat', new ClassRoomResource($classroom), 201);
            }
            return redirect()->route('classrooms.index')->with('success', 'Kelas berhasil dibuat');
        } catch (Exception $e) {
            return ResponseHelper::error(message: $e->getMessage(),code:$e->getCode());
        }
    }

    /**
     * Tampilkan detail kelas berdasarkan ID
     */
    public function show(Request $request, $id)
    {
        try {
            $classroom = $this->notFoundHandler->handleNotFound($id);
            if ($this->wantsJson($request)) {
                return ResponseHelper::success('Detail kelas', $classroom);
            }
            return view('classrooms.show', compact('classroom'));
        } catch (Exception $e) {
            if ($this->wantsJson($request)) {
                return ResponseHelper::error(message: $e->getMessage(),code:$e->getCode());
            }
            return redirect()->route('classrooms.index')->with('error', 'Kelas tidak ditemukan');
        }
    }

    /**
     * Form edit (tidak digunakan di API)
     */
    public function edit($id)
    {
        try {
            $classroom = $this->repo->show($id);
            return view('classrooms.edit', compact('classroom'));
        } catch (Exception $e) {
            return redirect()->route('classrooms.index')->with('error', 'Kelas tidak ditemukan');
        }
    }

    /**
     * Perbarui data kelas
     */
    public function update(ClassroomRequest $request, $id)
    {
        try {
            $updated = $this->repo->Update($id, $request->validated());
            if ($this->wantsJson($request)) {
                return ResponseHelper::success('Kelas berhasil diperbarui', new ClassRoomResource($updated));
            }
            return redirect()->route('classrooms.index')->with('success', 'Kelas berhasil diperbarui');
        } catch (Exception $e) {
            if ($this->wantsJson($request)) {
                return ResponseHelper::error(message: $e->getMessage(),code:$e->getCode());
            }
            return redirect()->route('classrooms.index')->with('error', 'Gagal memperbarui kelas: ' . $e->getMessage());
        }
    }

    /**
     * Hapus data kelas
     */
    public function destroy(Request $request, $id)
    {
        try {
            $deleted = $this->repo->destroy($id);
            if ($this->wantsJson($request)) {
                return ResponseHelper::success(null,'Kelas berhasil dihapus');
            }
            return redirect()->route('classrooms.index')->with('success', 'Kelas berhasil dihapus');
        } catch (Exception $e) {
            if ($this->wantsJson($request)) {
                return ResponseHelper::error(message: $e->getMessage(),code:$e->getCode());
            }
            return redirect()->route('classrooms.index')->with('error', 'Gagal menghapus kelas: ' . $e->getMessage());
        }
    }

    protected function wantsJson(Request $request)
    {
        if ($request->is('api/*')) {
        return true;
        }
        return false;
    }

}
