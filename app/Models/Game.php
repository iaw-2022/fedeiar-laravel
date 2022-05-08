<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model{
    
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'games';

    public function categories(){
        return $this->hasMany(Category::class, 'game_id', 'id');
    }

    public function videos(){
        return $this->hasMany(SpeedrunVideo::class, 'game_id', 'id');
    }
}
