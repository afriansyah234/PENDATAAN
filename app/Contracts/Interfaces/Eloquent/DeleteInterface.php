<?php
namespace App\Contracts\Interfaces\Eloquent;

use Illuminate\Support\Facades\Request;
interface DeleteInterface
{
    public function delete($id);
}