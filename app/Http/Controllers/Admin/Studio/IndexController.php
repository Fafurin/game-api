<?php

namespace App\Http\Controllers\Admin\Studio;

use App\Http\Controllers\Controller;
use App\Models\Studio;

class IndexController extends Controller
{
    public function __invoke()
    {
        $studios = Studio::all();
        return view('admin.studio.index', compact('studios'));
    }
}
