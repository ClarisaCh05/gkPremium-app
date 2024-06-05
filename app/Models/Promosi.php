<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    use HasFactory;

    protected $table = 'promosi';
    protected $fillable = ['id_promo', 'title'];
    protected $primaryKey = 'id_promo';
    public $incrementing = true; // Ensure auto-incrementing is enabled
    protected $keyType = 'int'; // Specify the key type
}
