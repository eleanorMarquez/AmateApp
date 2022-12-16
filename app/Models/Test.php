<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_author',
        'id_ask',
        'answer',
    ];

    public function usuario()
    {
        return $this->hasMany(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function questionsda()
    {
        return $this->belongsTo(Question::class, 'id_ask');
    }
}
