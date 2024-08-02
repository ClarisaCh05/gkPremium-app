<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'color';
    protected $primaryKey = 'id_color'; // Ensure this is the correct primary key
    protected $fillable = ['id_color','color'];
}