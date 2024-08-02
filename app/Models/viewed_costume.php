<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewed_costume extends Model
{
    use HasFactory;

    protected $table = 'viewed_costume';
    protected $fillable = ['id_view', 'id_costume', 'created_at', 'updated_at'];
    protected $primaryKey = 'id_view';
}
