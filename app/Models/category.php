<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'category';
    protected $primaryKey = 'id_category'; // Ensure this is the correct primary key
    protected $fillable = ['id_category','category', 'views'];
}
