<?php

namespace App\Http\Controllers\Admin\Studio;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.studio.create');
    }
}
