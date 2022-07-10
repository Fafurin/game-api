<?php

namespace App\Http\Controllers\Admin\Game;

use App\Http\Requests\Admin\Game\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
//        передаем data в метод store GameService
        $this->service->store($data);
        return redirect()->route('admin.game.index');
    }
}
