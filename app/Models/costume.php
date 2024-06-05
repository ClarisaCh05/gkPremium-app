<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class costume extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'costume';
    protected $fillable = ['id_costume','name', 'size', 'description', 'views', 'price', 'interest'];
    protected $primaryKey = 'id_costume';

    public function images()
    {
        return $this->hasMany(image::class, 'id_costume', 'id_costume');
    }

}