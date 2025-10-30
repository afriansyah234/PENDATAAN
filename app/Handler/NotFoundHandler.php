<?php
namespace App\Handler;

use App\Contracts\Repositories\BaseRepository;
use App\Helpers\ResponseHelper;

class NotFoundHandler
{
    protected BaseRepository $repository;

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleNotFound(mixed $id): mixed
    {
        $data = $this->repository->findById($id);

        if (!$data) {
            return ResponseHelper::error(message:'data tidak ditemukan', code: 404);
        }

        return $data;
    }
}
?>
