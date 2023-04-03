<?php

namespace App\Models\FrontPages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main_service extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'sub_title',
        'main_image',
        'main_desc',
        'sub_desc',
    ];
}
