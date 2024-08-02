<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class search_history extends Model
{
    use HasFactory;

    protected $table = 'search_history';
    protected $fillable = ['id_search', 'search', 'id_category', 'id_theme', 'id_color', 'created_at', 'updated_at'];
    protected $primaryKey = 'id_search';
}
