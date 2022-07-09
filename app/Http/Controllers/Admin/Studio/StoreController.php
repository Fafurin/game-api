<?php

namespace App\Http\Controllers\Admin\Studio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Studio\StoreRequest;
use App\Models\Studio;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Studio::firstOrCreate($data);
        return redirect()->route('admin.studio.index');
    }
}
