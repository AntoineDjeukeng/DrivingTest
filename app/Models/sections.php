<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'number', 'grade'];
    public function questions()
    {
        return $this->hasMany(Questions::class);
    }
}
