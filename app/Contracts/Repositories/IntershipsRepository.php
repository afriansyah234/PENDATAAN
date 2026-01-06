<?php

namespace App\Contracts\Repositories;

use App\Models\Internships;

class IntershipsRepository extends BaseRepository
{

    public function __construct(Internships $model)
    {
        $this->model = $model;
    }
}
