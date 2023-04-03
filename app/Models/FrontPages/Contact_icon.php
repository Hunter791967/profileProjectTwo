<?php

namespace App\Models\FrontPages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_icon extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon_link',
        'icon_image',
    ];
}
