<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Campos permitidos para guardar
    protected $fillable = [
        'name',
        'description'
    ];
}