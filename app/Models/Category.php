<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'categories';

    public function game(){
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function speedrunVideos(){
        return $this->hasMany(SpeedrunVideo::class, 'category_id', 'id');
    }
}
