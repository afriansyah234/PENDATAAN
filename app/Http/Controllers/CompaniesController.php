<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CompaniesRepository;
use App\Handler\NotFoundHandler;
use App\Helpers\ResponseHelper;
use App\Http\Requests\CompaniesRequest;
use App\Http\Resources\CompaniesResource;
use Exception;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    protected CompaniesRepository $repo;
    protected NotFoundHandler $notFoundHandler;

    public function __construct(CompaniesRepository $repo, NotFoundHandler $notFoundHandler)
    {
        $this->repo = $repo;
        $this->notFoundHandler = $notFoundHandler;
    }

    /**
     * Tampilkan semua data perusahaan
     */
    public function index(Request $request)
    {
        try {
            $companies = $this->repo->get();
             return ResponseHelper::success(
                    'Daftar semua perusahaan',CompaniesResource::collection($companies),
                );
        } catch (Exception $e) {
            return ResponseHelper::error(message: $e->getMessage(), code: $e->getCode());
        }
    }

    /**
     * Tampilkan form create (web only)
     */
    public function create()
    {
       //
    }

    /**
     * Simpan data perusahaan baru
     */
    public function store(CompaniesRequest $request)
    {
        try {
            $company = $this->repo->store($request->validated());
                return ResponseHelper::success(
                    'Perusahaan berhasil dibuat',
                    new CompaniesResource($company),
                    201
                );
        } catch (Exception $e) {
            return ResponseHelper::error(message: $e->getMessage(), code: $e->getCode());
        }
    }

    /**
     * Detail perusahaan
     */
    public function show($id)
    {
       try {
        $com = $this->notFoundHandler->handleNotFound($id);
        return ResponseHelper::success(message:'data berhasil ditampilkan',data: new CompaniesResource($com));
       } catch (\Throwable $th) {
        //throw $th;
       }
    }

    /**
     * Form edit (web)
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update data perusahaan
     */
    public function update(CompaniesRequest $request, $id)
    {
        try {
            $updated = $this->repo->update($id, $request->validated());

            return ResponseHelper::success(
                    'Perusahaan berhasil diperbarui',
                    new CompaniesResource($updated),
                );
        } catch (Exception $e) {
            if ($this->wantsJson($request)) {
                return ResponseHelper::error(message: $e->getMessage(), code: $e->getCode());
            }

            return redirect()->route('companies.index')->with('error', 'Gagal memperbarui perusahaan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus perusahaan
     */
    public function destroy(Request $request, $id)
    {
        try {
            $this->repo->destroy($id);

            return ResponseHelper::success('Perusahaan berhasil dihapus',null,);
        } catch (Exception $e) {
            if ($this->wantsJson($request)) {
                return ResponseHelper::error(message: $e->getMessage(), code: $e->getCode());
            }

            return redirect()->route('companies.index')->with('error', 'Gagal menghapus perusahaan: ' . $e->getMessage());
        }
    }

    protected function wantsJson(Request $request)
    {
        return $request->is('api/*');
    }
}
