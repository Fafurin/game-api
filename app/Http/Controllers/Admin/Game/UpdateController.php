<?php

namespace App\Http\Controllers\Admin\Game;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Game\UpdateRequest;
use App\Models\Game;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Game $game)
    {
        $data = $request->validated();
        // передаем data в метод update GameService
        $this->service->update($data, $game);
        return redirect()->route('admin.game.index');
    }
}
