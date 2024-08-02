<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimoni_tema extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'testimoni_tema';
    protected $fillable = ['id_testimoni_tema','id_testimoni', 'id_theme'];
    protected $primaryKey = 'id_testimoni_tema';
}
