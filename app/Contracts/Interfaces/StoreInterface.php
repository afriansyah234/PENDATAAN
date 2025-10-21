<?php
namespace App\Contracts\Interfaces;

use Illuminate\Support\Facades\Request;
interface StoreInterface
{
    public function store(Request $request);
}