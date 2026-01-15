<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ClassroomRepository;
use App\Handler\NotFoundHandler;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\ClassRoomResource;
use App\Http\Resources\StudentResource;
use App\Models\Classroom;
use App\Models\Student;
use App\Services\Classroom\AssignStudentToClassroomService;
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
    public function update(
    StudentRequest $request,
    $id,
    AssignStudentToClassroomService $service
) {
    $student = Student::findOrFail($id);
    $data = $request->validated();

<<<<<<< Updated upstream
            return ResponseHelper::success(

                'Kelas berhasil diperbarui',new ClassRoomResource($updated),
            );
        } catch (Exception $e) {
            return ResponseHelper::error(
                message: $e->getMessage(),
                code: $e->getCode() ?: 500
            );
        }
=======
    // update data selain classroom
    $student->update(
        collect($data)->except('classroom_id')->toArray()
    );

    // kalau classroom diganti → lewat service
    if (
        isset($data['classroom_id']) &&
        $data['classroom_id'] !== $student->classroom_id
    ) {
        $classroom = Classroom::findOrFail($data['classroom_id']);
        $service->execute($classroom, $student);
>>>>>>> Stashed changes
    }

    return ResponseHelper::success(
        new StudentResource($student->load('classroom')),
        'Data siswa berhasil diperbarui'
    );
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
