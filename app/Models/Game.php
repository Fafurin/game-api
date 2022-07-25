<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'games';
    protected $fillable = [
        'name',
        'studio_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genres', 'game_id', 'genre_id');
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }

    // правила валидации для сохранения игр в бд
    public static function rules()
    {
        return [
            'name' => 'required|string',
            'studio' => 'required|string',
            'genres' => 'required|string',
        ];
    }
}
