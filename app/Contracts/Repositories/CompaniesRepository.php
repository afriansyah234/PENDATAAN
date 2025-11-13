<?php

namespace App\Contracts\Repositories;

use App\Models\Companies;

class CompaniesRepository extends BaseRepository
{
    public function __construct(Companies $model)
    {
        $this->model = $model;
    }
}
