<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Task;

class Task extends Model
{
    protected $fillable = ['title', 'completed', 'project_id', 'description'];

    // Relación con proyectos
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
