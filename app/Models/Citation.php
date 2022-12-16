<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Citation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_profesional',
        'date_cita',
        'time_start',
        'time_end',
        'desciption',
        'status',
        'type_cita',
        'link_cita'
    ];

    public function usuario()
    {
        return $this->hasMany(User::class);
    }

    public function usuariodata()
    {
        return $this->belongsTo(User::class, 'id_profesional');
    }

    public function citas()
    {
        return $this->hasMany(ReservarCita::class, 'id_citation');
    }
}
