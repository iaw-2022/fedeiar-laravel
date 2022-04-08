<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameCategoryRelation extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'game_category_relations';
}
