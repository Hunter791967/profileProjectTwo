<?php

namespace App\Models\FrontPages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MethodologyDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon_image',
        'methodology_desc',
    ];
}
