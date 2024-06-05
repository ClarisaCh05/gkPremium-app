<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimoni extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'testimoni';
    protected $fillable = ['id_testimoni', 'name', 'imageUrl', 'description'];
    protected $primaryKey = 'id_testimoni';
}
