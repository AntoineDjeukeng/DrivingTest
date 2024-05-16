<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class records extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'list_question','list_answer','score','comment'];
    
    
    public function list_questions($user_id)
    {
        $records = records::where('user_id', $user_id)->get();
    
        $list_questions = [];
        foreach ($records as $record) {
            if ($record->list_answer != null) {
                $twoDArray = $record->list_question;
                $twoDArray = json_decode($twoDArray, true);
                foreach ($twoDArray as $sectionId => $questions) {
                    if (!isset($list_questions[$sectionId])) {
                        $list_questions[$sectionId] = [];
                    }
                    $list_questions[$sectionId] = array_merge($list_questions[$sectionId], $questions);
                }
            }
        }
        $records = records::where('user_id', $user_id)->get();
        return $list_questions;
    }
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}