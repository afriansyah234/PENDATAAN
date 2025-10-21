<?php

namespace App\Contracts\Interfaces\Eloquent;

use Illuminate\Support\Facades\Request;

interface UpdateInterface
{
    public function update(Request $request, $id);
}
