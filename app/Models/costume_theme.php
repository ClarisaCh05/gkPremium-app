<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class costume_theme extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'costume_theme';
    protected $fillable = ['id_costume_theme','id_costume', 'id_theme'];
    protected $primaryKey = 'id_costume_theme';
}
