<?php

namespace App\Contracts\Repositories;

use App\Models\Classroom;

class ClassroomRepository extends BaseRepository
{

    public function __construct(Classroom $model)
    {
        $this->model = $model;
    }
}
