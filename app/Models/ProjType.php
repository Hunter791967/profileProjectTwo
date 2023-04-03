<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjType extends Model
{
    use HasFactory;
    protected $table = 'proj_types';
    protected $fillable = [
        'name',
        'image',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_proj_type', 'proj_type_id', 'project_id', 'id', 'id');
    }
}
