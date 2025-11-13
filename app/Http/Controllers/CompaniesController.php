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

            if ($this->wantsJson($request)) {
                return ResponseHelper::success(
                    CompaniesResource::collection($companies),
                    'Daftar semua perusahaan'
                );
            }

            return view('companies.index', compact('companies'));
        } catch (Exception $e) {
            return ResponseHelper::error(message: $e->getMessage(), code: $e->getCode());
        }
    }

    /**
     * Tampilkan form create (web only)
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Simpan data perusahaan baru
     */
    public function store(CompaniesRequest $request)
    {
        try {
            $company = $this->repo->store($request->validated());

            if ($this->wantsJson($request)) {
                return ResponseHelper::success(
                    new CompaniesResource($company),
                    'Perusahaan berhasil dibuat',
                    201
                );
            }

            return redirect()->route('companies.index')->with('success', 'Perusahaan berhasil dibuat');
        } catch (Exception $e) {
            return ResponseHelper::error(message: $e->getMessage(), code: $e->getCode());
        }
    }

    /**
     * Detail perusahaan
     */
    public function show(Request $request, $id)
    {
        try {
            $company = $this->notFoundHandler->handleNotFound($id, 'company');

            if ($this->wantsJson($request)) {
                return ResponseHelper::success(
                    new CompaniesResource($company),
                    'Detail perusahaan'
                );
            }

            return view('companies.show', compact('company'));
        } catch (Exception $e) {
            if ($this->wantsJson($request)) {
                return ResponseHelper::error(message: $e->getMessage(), code: $e->getCode());
            }

            return redirect()->route('companies.index')->with('error', 'Perusahaan tidak ditemukan');
        }
    }

    /**
     * Form edit (web)
     */
    public function edit($id)
    {
        try {
            $company = $this->repo->show($id);
            return view('companies.edit', compact('company'));
        } catch (Exception $e) {
            return redirect()->route('companies.index')->with('error', 'Perusahaan tidak ditemukan');
        }
    }

    /**
     * Update data perusahaan
     */
    public function update(CompaniesRequest $request, $id)
    {
        try {
            $updated = $this->repo->update($id, $request->validated());

            if ($this->wantsJson($request)) {
                return ResponseHelper::success(
                    new CompaniesResource($updated),
                    'Perusahaan berhasil diperbarui'
                );
            }

            return redirect()->route('companies.index')->with('success', 'Perusahaan berhasil diperbarui');
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

            if ($this->wantsJson($request)) {
                return ResponseHelper::success(null, 'Perusahaan berhasil dihapus');
            }

            return redirect()->route('companies.index')->with('success', 'Perusahaan berhasil dihapus');
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
