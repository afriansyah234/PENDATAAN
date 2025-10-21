<?php
namespace App\Contracts\Interfaces;
use Illuminate\Support\Facades\Request;
interface GetbyIdInterface
{
    public function getById($id);
}