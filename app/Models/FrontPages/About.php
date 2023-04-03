<?php

namespace App\Models\FrontPages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'about_favorite',
        'about_desc',
        'btn_text',
        // 'image',
        'about_tab',
        'resume',
    ];
}
