<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Genre\StoreRequest;
use App\Models\Genre;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Genre::firstOrCreate($data);
        return redirect()->route('admin.genre.index');
    }
}
