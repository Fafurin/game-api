<?php

namespace App\Http\Controllers\Admin\Studio;

use App\Http\Controllers\Controller;
use App\Models\Studio;

class EditController extends Controller
{
    public function __invoke(Studio $studio)
    {
        return view('admin.studio.edit', compact('studio'));
    }
}
