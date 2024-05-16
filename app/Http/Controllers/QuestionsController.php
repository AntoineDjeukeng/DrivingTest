<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


use function Illuminate\Events\queueable;


class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        // dd($request->all());
        
        $time = time();
        return view('questions.index'
        , [
            'questions' => Questions::latest()->filter(['search' => request('search')])->simplePaginate(10)->withQueryString(),
            // dd(request('search')),
            'time' => $time,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('questions.create' ,['sections' => Sections::all(),]
    );
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request, Questions $questions)
     {
        // dd($request->all());


        $formFields= $request->validate([
             'law' => 'nullable',
             'code' => 'nullable',
             'section_id' => 'required',
             'question' => 'required',
             'answer' => 'required',
             'image' => 'nullable',
             'Toption' => 'required'
         ]);
     
         if($request->text_a==null){
            $request->validate([
                'image_a' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image_b' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image_c' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
             $formFields['a']=$request->file('image_a')->store('images', 'public');
             $formFields['b']=$request->file('image_b')->store('images', 'public');
             $formFields['c']=$request->file('image_c')->store('images', 'public');
         }
            else{
                $formFields['a']=$request->text_a;
                $formFields['b']=$request->text_b;
                $formFields['c']=$request->text_c;
            }
            if($request->file('image')){
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $formFields['image'] =  $request->file('image')->store('images', 'public');
            }
            $type=$request->Toption;
        
         $formFields['type'] = $type;
        
         $questions->create($formFields);
     
         return redirect()->route('questions.index')->with('success', 'Question created successfully.');
     }
     
    



    /**
     * Display the specified resource.
     */
    public function show(Questions $question, Request $request)
    {
        $section = Sections::where('id', $question->section_id)->first();
        return view('questions.show', [
            'question' => $question,
            'section' => $section
        ]); 



        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questions $question)
    {   
        // dd($question->section_id);
        
        return view('questions.edit', [
            'question' => $question,
            'sections' => Sections::all(),
        ]);
    }






    public function update(Request $request, Questions $question)
    {
    //    dd($request->all(), $question);
        $formFields = $request->validate([
            'law' => 'nullable',
            'code' => 'nullable',
            'section_id' => 'nullable', // Change to nullable
            'question' => 'nullable', // Change to nullable
            'answer' => 'nullable', // Change to nullable
            'image' => 'nullable',
            'Toption' => 'nullable',
        ]);
        
        if ($question->image and !array_key_exists('image', $formFields)) {
            $formFields['image'] = $question->image;             
        }else{
            if ($request->file('image')){
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $image = $request->file('image');
                $formFields['image'] =  $image->store('images', 'public');
            }
        } 
        if ($request->text_a==null){
            $imageFields = ['image_a', 'image_b', 'image_c'];

            foreach ($imageFields as $field) {
                // Check if the image field exists in the request
                if ($request->hasFile($field)) {
                    // Validate the image
                    $request->validate([
                        $field => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    ]);
            
                    // Store the image
                    $formFields[$field[6]] = $request->file($field)->store('images', 'public');
                } else {
                    // Use the existing value if the image is not updated
                    $formFields[$field[6]] = $question->{$field[6]};
                }
            }  
              
        } else {
            $formFields['a'] = $request->text_a;
            $formFields['b'] = $request->text_b;
            $formFields['c'] = $request->text_c;
        }



        // dd($request->all(), $formFields, $question);

        $formFields['type'] = $question->type;
    
        $question->update($formFields);
        return redirect()->route('questions.show', $question)->with('message', 'Question Updated!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questions $question)
    {   
        // dd($questions);
        $id = $question->id;
        $question->delete();
        return redirect()->route('questions.index')->with('message', 'Question ' . $id . ' Deleted!');
    }
}
