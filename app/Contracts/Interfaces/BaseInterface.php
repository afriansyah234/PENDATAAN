<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetAllInterface;
use App\Contracts\Interfaces\Eloquent\GetByIdInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface BaseInterface extends
    GetAllInterface,
    GetByIdInterface,
    StoreInterface,
    UpdateInterface,
    DeleteInterface
{
}