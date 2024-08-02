<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asked_costume extends Model
{
    use HasFactory;

    protected $table = 'asked_costume';
    protected $fillable = ['id_question', 'id_costume', 'created_at', 'updated_at'];
    protected $primaryKey = 'id_question';
}
