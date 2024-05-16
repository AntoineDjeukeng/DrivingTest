<?php

namespace App\Http\Controllers;
use App\Models\Sections;
use App\Models\Questions;
use App\Models\records;
use App\Models\Quiz;


use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz.index',['sections' => Sections::all(),]);
    }
    public function create()
    {

        $user_id = auth()->user()->id;

        $quiz = new Quiz();
        $quiz = $quiz->new_quiz($user_id);
        $selections = $quiz['selection'];
        $questions=[];
        foreach ($selections as $selection) {
            foreach ($selection as $question) {
                $questions[] = $question;
            } 
        }
 
        
        shuffle($questions);
        // dd($quiz);

        
        // dd($selection, $list_new_questions);
        // $user_id = auth()->user()->id;
        // dd($selection, $user_id);
        // $questions = Questions::where('section_id', $sectionId)->get();
        return view('quiz.start', ['questions' => $questions, 'recordId' => $quiz['recordId'], 'time' => $quiz['time']]);
    }
    public function store(Request $request)
    {
        
        
        $recordId = $request->recordId;
        $quiz = new Quiz();
        $results = $quiz->results($recordId, $request);
        
        return view('quiz.result', ['recordId' => $recordId, 'results' => $results]);
    }
}
