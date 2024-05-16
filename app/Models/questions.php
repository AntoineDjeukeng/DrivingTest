<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = ['law', 'code', 'question', 'answer', 'a', 'b', 'c', 'type', 'image', 'user_id', 'section_id'];
    protected $hidden = [
        'answer',
    ];
    
    public function scopeFilter($query, array $filters)
    {


       
        if ($filters['search'] ?? false) {
            $query->where(function ($query) use ($filters) {
                $query->where('a', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('b', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('c', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('law', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('code', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('question', 'like', '%' . $filters['search'] . '%');
            });
        }
    }
   
    public function user()
    {
        return $this->belongsTo(Sections::class);
    }
}
