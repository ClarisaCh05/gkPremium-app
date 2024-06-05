<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'image';
    protected $fillable = ['id_image','id_costume', 'imageUrl'];
    protected $primaryKey = 'id_image';
    
    public function costume()
    {
        return $this->belongsTo(costume::class, 'id_costume', 'id_costume');
    }
}
