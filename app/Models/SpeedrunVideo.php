<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpeedrunVideo extends Model{
    
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'speedrun_videos';

    public function game(){
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}