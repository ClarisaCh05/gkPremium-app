<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimoni_kategori extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'testimoni_kategori';
    protected $fillable = ['id_testimoni_kategori','id_testimoni', 'id_kategori'];
    protected $primaryKey = 'id_testimoni_kategori';
}
