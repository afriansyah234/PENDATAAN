<?php
namespace App\Contracts\Interfaces\Eloquent;

use Illuminate\Support\Facades\Request;
interface StoreInterface
{
    public function store(Request $request);
}