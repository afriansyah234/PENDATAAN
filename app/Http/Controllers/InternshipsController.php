<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\IntershipsRepository;
use App\Handler\NotFoundHandler;
use App\Http\Requests\Interships;
use App\Helpers\ResponseHelper;
use App\Http\Requests\IntershipsRequest;
use Illuminate\Http\JsonResponse;

class InternshipsController extends Controller
{
    protected IntershipsRepository $repo;
    protected NotFoundHandler $notFoundHandler;

    public function __construct(
        IntershipsRepository $repo,
        NotFoundHandler $notFoundHandler
    ) {
        $this->repo = $repo;
        $this->notFoundHandler = $notFoundHandler;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $data = $this->repo->get();

            return ResponseHelper::success(
                'Berhasil mengambil data PKL',
                $data
            );

        } catch (\Throwable $th) {
            return ResponseHelper::error(
                'Gagal mengambil data PKL',
                500,
                $th->getMessage()
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IntershipsRequest $request): JsonResponse
    {
        try {
            $data = $this->repo->store($request->validated());

            return ResponseHelper::success(
                'Data PKL berhasil ditambahkan',
                $data,
                201
            );

        } catch (\Throwable $th) {
            return ResponseHelper::error(
                'Gagal menambahkan data PKL',
                500,
                $th->getMessage()
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        try {
            $data = $this->repo->findById($id);

            if (!$data) {
                return $this->notFoundHandler
                    ->handleNotFound('Data PKL tidak ditemukan');
            }

            return ResponseHelper::success(
                'Detail data PKL',
                $data
            );

        } catch (\Throwable $th) {
            return ResponseHelper::error(
                'Gagal mengambil detail PKL',
                500,
                $th->getMessage()
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IntershipsRequest $request, $id): JsonResponse
    {
        try {
            $data = $this->repo->findById($id);

            if (!$data) {
                return $this->notFoundHandler
                    ->handleNotFound('Data PKL tidak ditemukan');
            }

            $updated = $this->repo->update(
                $id,
                $request->validated()
            );

            return ResponseHelper::success(
                'Data PKL berhasil diperbarui',
                $updated
            );

        } catch (\Throwable $th) {
            return ResponseHelper::error(
                'Gagal memperbarui data PKL',
                500,
                $th->getMessage()
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        try {
            $data = $this->repo->findById($id);

            if (!$data) {
                return $this->notFoundHandler
                    ->handleNotFound('Data PKL tidak ditemukan');
            }

            $this->repo->destroy($id);

            return ResponseHelper::success(
                'Data PKL berhasil dihapus'
            );

        } catch (\Throwable $th) {
            return ResponseHelper::error(
                'Gagal menghapus data PKL',
                500,
                $th->getMessage()
            );
        }
    }
}
