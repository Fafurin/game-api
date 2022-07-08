<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'games';
    protected $fillable = ['name'];

    public function genres(){
        return $this->belongsToMany(Genre::class, 'game_genres', 'game_id', 'genre_id');
    }

}
