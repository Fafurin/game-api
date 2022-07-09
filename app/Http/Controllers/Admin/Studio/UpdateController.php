<?php

namespace App\Http\Controllers\Admin\Studio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Studio\UpdateRequest;
use App\Models\Studio;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Studio $studio)
    {
        $data = $request->validated();
        $studio->update($data);
        return redirect()->route('admin.studio.index');
    }
}
