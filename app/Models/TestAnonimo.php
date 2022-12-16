<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestAnonimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_random',
        'id_ask',
        'answer',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function questionsda()
    {
        return $this->belongsTo(Question::class, 'id_ask');
    }
}
