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

    public function categories()
    {
        return $this->hasMany(TestimoniKategori::class, 'id_testimoni', 'id_testimoni');
    }

    public function themes()
    {
        return $this->hasMany(TestimoniTema::class, 'id_testimoni', 'id_testimoni');
    }
}
