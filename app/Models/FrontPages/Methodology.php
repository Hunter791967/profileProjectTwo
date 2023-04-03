<?php

namespace App\Models\FrontPages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Methodology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];
}
