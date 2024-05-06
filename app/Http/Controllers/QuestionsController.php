<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        $questions = [];
        $types = Questions::distinct('type')->pluck('type');
        foreach ($types as $type) {
            $question = Questions::where('type', $type)->first();
            if ($question) {
                $questions[] = $question;
            }
        }
        $time = time();
        // dd($time);
        return view('questions.index'
        , [
            'questions' => $questions,'time' => $time,
            // 'questions' => Questions::latest()->filter(['search' => request('search')])->simplePaginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('questions.create'
        return view('questions.create' ,['sections' => Sections::all(),]
    );
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request, Questions $questions)
     {
        // dd($request->all());


        // $formFields= $request->validate([
        //      'law' => 'nullable',
        //      'code' => 'nullable',
        //      'section_id' => 'required',
        //      'question' => 'required',
        //      'answer' => 'required',
        //      'a' => 'required',
        //      'b' => 'required',
        //      'c' => 'nullable',
        //      'image' => 'nullable',
        //      'Toption' => 'required'
        //  ]);
     

        //  $opImg = $request->file('a') ? 1 : 0;
        //  $nq = !empty($request->c) ? 1 : 0;
        //  $img = !empty($request->file('image')) ? 1 : 0;
        // //  dd($formFields, $opImg, $nq, $img);
        //  if ($request->Toption == 0 && ($opImg && $img )) {
        //      return back()->with('error', "Images can't options if the question as image")->withInput();
        //  }
         
     
        //  // Determine the type based on file inputs
        //  if ($opImg == 0 && $nq == 0 && $img == 0) {
        //      $type = 1;
        //  } elseif ($opImg == 0 && $nq == 1 && $img == 0) {
        //      $type = 2;
        //  } elseif ($opImg == 0 && $nq == 0 && $img == 1) {
        //     $request->validate([
        //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
        //     $image = $request->file('image');
        //     $formFields['image'] =  $image->store('images', 'public');
        //     $type = 4;
        //  } elseif ($opImg == 0 && $nq == 1 && $img == 1) {
        //     $request->validate([
        //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
        //     $image = $request->file('image');
        //     $formFields['image'] =  $image->store('images', 'public');            
        //     $type = 5;
        //  } elseif ($opImg == 1 && $nq == 1 && $img == 0) {
        //     $request->validate([
        //         'a' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //         'b' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //         'c' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
        //     $a = $request->file('a');
        //     $b = $request->file('b');
        //     $c = $request->file('c');
        //     $formFields['a'] =  $a->store('images', 'public');
        //     $formFields['b'] =  $b->store('images', 'public');
        //     $formFields['c'] =  $c->store('images', 'public');
        //      $type = 3;
        //  }
     
        //  // Prepare form fields for storing
        // //  $formFields = $request->only(['law', 'code', 'section_id', 'question', 'answer', 'a', 'b', 'c', 'image']);
        //  $formFields['type'] = $type;
        // //  dd($formFields);
        //  // Store the data
        //  $questions->create($formFields);
     
         return redirect()->route('questions.index')->with('success', 'Question created successfully.');
     }
     
    



    /**
     * Display the specified resource.
     */
    public function show(Questions $questions, Request $request)
    {
        // dd($request, $questions);
        return view('questions.show');



        // return view('questions.show', [
        //     'question' => $questions,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questions $questions)
    {   
        $questions = [];
        $types = Questions::distinct('type')->pluck('type');
        foreach ($types as $type) {
            $question = Questions::where('type', $type)->first();
            if ($question) {
                $questions[] = $question;
            }
        }
        // return view('questions.edit'
        // , [
        //     'questions' => $questions,
        //     // 'questions' => Questions::latest()->filter(['search' => request('search')])->simplePaginate(10)->withQueryString(),
        // ]);
        return view('questions.edit', [
            'question' => $questions,
            'sections' => Sections::all(),
        ]);
    }






    // public function update(Request $request, Questions $questions)
    // {
       
    //     $formFields = $request->validate([
    //         'law' => 'nullable',
    //         'code' => 'nullable',
    //         'section_id' => 'nullable', // Change to nullable
    //         'question' => 'nullable', // Change to nullable
    //         'answer' => 'nullable', // Change to nullable
    //         'a' => 'nullable', // Change to nullable
    //         'b' => 'nullable', // Change to nullable
    //         'c' => 'nullable',
    //         'image' => 'nullable',
    //         'Toption' => 'required'
    //     ]);
    //     // dd($request->all(), $formFields);
    //     if ($questions->image) {
    //         if (!array_key_exists('image', $formFields) ) {
    //             $formFields['image'] = $questions->image;
    //         } else {
    //             $request->validate([
    //                 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //             ]);
    //             $image = $request->file('image');
    //             $formFields['image'] =  $image->store('images', 'public');
    //         } 
    //         $img =  1;
    //     } else {
    //         $img = 0;
    //     }
    //     if (!empty($request->c)) {
    //         if($request->file('a')){
    //             $request->validate([
    //                 'a' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //                 'b' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //                 'c' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //             ]);
    //             $a = $request->file('a');
    //             $b = $request->file('b');
    //             $c = $request->file('c');
    //             $formFields['a'] =  $a->store('images', 'public');
    //             $formFields['b'] =  $b->store('images', 'public');
    //             $formFields['c'] =  $c->store('images', 'public');
    //             $opImg = 1;
    //         } else {
    //             $opImg = 0;
    //         }
    //         // dd(Storage::disk('public')->exists($formFields['c']), $opImg );

    //         $nq = 1;
    //     } else {

    //         if(Storage::disk('public')->exists($questions->c)) {
    //             $formFields['a'] = $questions->a;
    //             $formFields['b'] = $questions->b;
    //             $formFields['c'] = $questions->c;
                
    //             $opImg = 1;
    //             $nq = 1;
    //         } else {
    //             $opImg = 0;
    //             $nq = 0;
    //         }
    //     }


    //     if ($request->Toption == 0 && (($opImg && $img ) )) {
    //         return back()->with('error', "Images can't options if the question as image")->withInput();
    //     }

    //     if ($opImg == 0 && $nq == 0 && $img == 0) {
    //         $type = 1;
    //     } elseif ($opImg == 0 && $nq == 1 && $img == 0) {
    //         $type = 2;
    //     } elseif ($opImg == 0 && $nq == 0 && $img == 1) {
    //        $type = 4;
    //     } elseif ($opImg == 0 && $nq == 1 && $img == 1) {           
    //        $type = 5;
    //     } elseif ($opImg == 1 && $nq == 1 && $img == 0) {
    //         $type = 3;
    //     }
    //     $formFields['type'] = $type;
    
    //     $questions->update($formFields);
    //     return redirect()->route('questions.show', $questions)->with('message', 'Question Updated!');
    // }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questions $questions)
    {   
        dd($questions);
        $id = $questions->id;
        $questions->delete();
        return redirect()->route('questions.index')->with('message', 'Question ' . $id . ' Deleted!');
    }
}
