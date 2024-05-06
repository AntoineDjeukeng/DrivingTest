<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = ['law', 'code', 'question', 'answer', 'a', 'b', 'c', 'type', 'image', 'user_id', 'section_id'];

    public function user()
    {
        return $this->belongsTo(Sections::class);
    }
}
