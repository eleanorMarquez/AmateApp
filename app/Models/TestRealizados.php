<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestRealizados extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_author',
        'author_ramdon',
        'answer',
        'type_test',
    ];

    public function usuario()
    {
        return $this->hasMany(User::class);
    }
}
