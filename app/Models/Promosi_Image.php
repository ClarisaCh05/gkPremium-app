<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promosi_Image extends Model
{
    use HasFactory;

    protected $table = 'promosi_image';
    protected $fillable = ['id_promo_img', 'id_promo', 'image', 'created_at', 'updated_at'];
    protected $primaryKey = 'id_promo_img';
}
