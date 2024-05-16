<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    public function new_quiz($user_id)
    {
        $records = new records();
        $record = $records->list_questions($user_id);

        $sections = Sections::all();
        $selection=[];
        $list_new_questions=[];
        foreach ($sections as $section) {
            $n_question=$section->number;
            $sectionId = $section->id;
            if (isset($record[$sectionId])) {
                $list_old_questions = $record[$sectionId];
            } else {
                $list_old_questions = [];
            }
            $questions = Questions::where('section_id', $sectionId)
            ->whereNotIn('id', $list_old_questions)
            ->get()
            ->shuffle()
            ->take($n_question);
            
            $selection[$sectionId] = $questions;
            $list_new_questions[$sectionId] = $questions->pluck('id')->toArray();
        }
        $formFields = [
            'user_id' => $user_id,
            'list_question' => json_encode($list_new_questions),
        ];
        $record = $records->create($formFields);
        $recordId = $record->id;
        $time = time();
        return ['selection' => $selection, 'recordId' => $recordId, 'time' => $time];

    }
    public function results($recordId,$request)
    {
        $records = new records();
        $record = $records->find($recordId);

        $list_questions = json_decode($record->list_question, true);
        $sections = Sections::all();
        $results = [];
        $score = 0;
        $list_answers = [];
        foreach ($list_questions as $key1 => $value) {
            $grade = $sections->where('id', $key1)->first()->grade;
            for($i=0; $i<count($value); $i++) {
                $index = $value[$i];
                $question = Questions::find($index);
                if (isset($request[$index])) {
                    $answer = $request[$index];
                } else {
                    $answer = '';
                }
                $list_answers[$key1][$i] = $answer;
                if (strtoupper($answer) == strtoupper($question->answer)) {
                    $score += $grade;
                    $results[$index] = ['correct' => true, 'answer' => $answer, 'correct_answer' => $question->answer, 'question' => $question];
                } else {
                    $results[$index] = ['correct' => false, 'answer' => $answer, 'correct_answer' => $question->answer, 'question' => $question];
                }
                
            }
        }
        // $record->update([ 'list_answer' => json_encode($list_answers), 'grade' => $score]);
        // $Used_time = time() - $record->created_at->timestamp;
        $record->list_answer = json_encode($list_answers);
        $record->grade = $score;
        $record->used_time = time() - $record->created_at->timestamp;
        $record->save();
        // dd($record);
        return ['results' => $results, 'score' => $score];
    }
}



