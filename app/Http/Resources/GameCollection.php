<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GameCollection extends ResourceCollection
{
//    public static $wrap = 'games';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    // в коллекции выводим модели с полями, описанными в GameResource
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
