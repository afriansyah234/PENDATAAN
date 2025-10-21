<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

interface UpdateInterface
{
    public function update(Request $request, $id);
}
