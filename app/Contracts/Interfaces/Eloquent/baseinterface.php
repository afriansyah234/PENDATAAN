<?php
namespace App\Contracts\Interfaces\Eloquent;

interface BaseInterface extends
    GetAll,
    Store,
    GetById,
    update,
    delete
{
}


?>