<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'client_name',
        'location_add',
        'period',
        'date',
        'project_link',
        'project_desc',
    ];

    public function proj_types()
    {
        return $this->belongsToMany(ProjType::class, 'project_proj_type', 'project_id', 'proj_type_id', 'id', 'id');
    }
}
