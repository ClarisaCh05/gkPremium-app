<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class theme extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'theme';
    protected $primaryKey = 'id_theme'; // Ensure this is the correct primary key
    protected $fillable = ['id_theme','theme'];
}
