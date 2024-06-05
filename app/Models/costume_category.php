<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class costume_category extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'costume_category';
    protected $fillable = ['id_costume_category','id_costume', 'id_category'];
    protected $primaryKey = 'id_costume_category';
}
