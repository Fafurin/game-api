<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
//    public static $wrap = 'game';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    // определяем необходимые для вывода поля модели
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'studio' => $this->studio->name,
            'genres' => $this->genres->pluck('name'),
        ];
    }
}
