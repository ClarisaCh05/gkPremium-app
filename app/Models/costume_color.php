<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class costume_color extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'costume_color';
    protected $fillable = ['id_costume_color','id_costume', 'id_color'];
    protected $primaryKey = 'id_costume_color';
}
