<?php

namespace App\Contracts\Interfaces\Eloquent;

interface GetById
{
    public function findById(mixed $id);
}

?>
