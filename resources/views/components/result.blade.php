<div class="text-gray-900 dark:text-gray-100 text-2xl group  relative m-3 p-5 border-4 border-black  rounded-xl ">
    @php
        $question = $result['question'];
        // dd($question);
    @endphp


    <div class="grid grid-cols-3 gap-4">
        <div class="flex-1 m-2 text-center">
            <div>
                {{ $result['answer'] }}
            </div>
            <div class="border-t-2 pt-2">
                {{ $question->section_id }}
            </div>
        </div>
        <div class="flex-1 m-2 text-center">
            <div>
                Correct
            </div>
            <div class="border-t-2 pt-2">
                {{ $result['correct_answer'] }}
            </div>
        </div>
    </div>



    <div class="px-2 text-2xl">
        <h1>{{ $question->question }}</h1>
    </div>
    @if ($question->image)
        <div class="flex justify-center fluid m-5">
            <img src="{{ asset('storage/' . $question->image) }}" alt="image" class=" rounded-md">
        </div>
    @endif
    <x-quiz-result :question="$question" :result="$result" class="" />

</div>
