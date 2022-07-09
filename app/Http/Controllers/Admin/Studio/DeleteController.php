<?php

namespace App\Http\Controllers\Admin\Studio;

use App\Http\Controllers\Controller;
use App\Models\Studio;

class DeleteController extends Controller
{
    public function __invoke(Studio $studio)
    {
        $studio->delete();
        return redirect()->route('admin.studio.index');
    }
}
