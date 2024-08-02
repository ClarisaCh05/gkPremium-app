<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rented extends Model
{
    use HasFactory;

    protected $table = 'rented';
    protected $fillable = ['id_rent', 'id_costume', 'description', 'created_at', 'updated_at', 'ended_at'];
    protected $primaryKey = 'id_rent';

    public function costume()
    {
        return $this->belongsTo(costume::class, 'id_costume', 'id_costume');
    }
}
