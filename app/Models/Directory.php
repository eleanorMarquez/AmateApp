<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    use HasFactory;

    protected $fillable = [
        'entity',
        'image',
        'area_of_contact',
        'phones',
        'ubication',
        'facebook',
        'instagram',
    ];
}
