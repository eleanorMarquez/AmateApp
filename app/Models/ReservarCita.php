<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservarCita extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_citation',
        'id_user',
        'status',
    ];

    public function usuario()
    {
        return $this->hasMany(User::class);
    }
    public function usuariodata()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function citaciones()
    {
        return $this->hasMany(Citation::class);
    }

    public function citacioness()
    {
        return $this->hasMany(Citation::class);
    }
}
