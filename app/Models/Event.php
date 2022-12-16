<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'ubication',
        'date',
        'hour',
        'id_author',
    ];

    public function usuario()
    {
        return $this->hasMany(User::class);
    }

    public function datauser()
    {
        return $this->belongsTo(User::class, 'id_author');
    }
}
