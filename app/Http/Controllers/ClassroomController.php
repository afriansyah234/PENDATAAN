<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ClassroomRepository;
use App\Handler\NotFoundHandler;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Http\Resources\ClassRoomResource;
use Exception;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    protected ClassroomRepository $repo;
    protected NotFoundHandler $notFoundHandler;

    public function __construct(
        ClassroomRepository $repo,
        NotFoundHandler $notFoundHandler
    ) {
        $this->repo = $repo;
        $this->notFoundHandler = $notFoundHandler;
    }

    /**
     * GET /api/classrooms
     */
    public function index(Request $request)
    {
        try {
            $search = $request->query('search');
            $classrooms = $this->repo->get($search);

            return ResponseHelper::success(
                'Daftar semua kelas',ClassRoomResource::collection($classrooms),

            );
        } catch (Exception $e) {
            return ResponseHelper::error(
                message: $e->getMessage(),
                code: $e->getCode() ?: 500
            );
        }
    }

    /**
     * POST /api/classrooms
     */
    public function store(ClassroomRequest $request)
    {
        try {
            $classroom = $this->repo->store($request->validated());

            return ResponseHelper::success(
                'Kelas berhasil dibuat',new ClassRoomResource($classroom),

                201
            );
        } catch (Exception $e) {
            return ResponseHelper::error(
                message: $e->getMessage(),
                code: $e->getCode() ?: 500
            );
        }
    }

    /**
     * GET /api/classrooms/{id}
     */
    public function show($id)
    {
        try {
            $classroom = $this->notFoundHandler->handleNotFound($id);

            return ResponseHelper::success(
                'Detail kelas',new ClassRoomResource($classroom),

            );
        } catch (Exception $e) {
            return ResponseHelper::error(
                message: $e->getMessage(),
                code: $e->getCode() ?: 404
            );
        }
    }

    /**
     * PUT /api/classrooms/{id}
     */
    public function update(ClassroomRequest $request, $id)
    {
        try {
            $updated = $this->repo->update($id, $request->validated());

            return ResponseHelper::success(

                'Kelas berhasil diperbarui',new ClassRoomResource($updated),
            );
        } catch (Exception $e) {
            return ResponseHelper::error(
                message: $e->getMessage(),
                code: $e->getCode() ?: 500
            );
        }
    }

    /**
     * DELETE /api/classrooms/{id}
     */
    public function destroy($id)
    {
        try {
            $this->repo->destroy($id);

            return ResponseHelper::success(
                'Kelas berhasil dihapus',null,
            );
        } catch (Exception $e) {
            return ResponseHelper::error(
                message: $e->getMessage(),
                code: $e->getCode() ?: 500
            );
        }
    }
}
