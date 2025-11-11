<?php
namespace App\Contracts\Repositories;

use App\Models\Teacher;

class TeacherRepository extends BaseRepository
{
    public function __construct(Teacher $model)
    {
        $this->model = $model;
    }
}

?>
