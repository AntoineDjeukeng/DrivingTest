<x-layout>
    <div class="container my-5 py-2  px-0">



        <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <div class="row">
            <div class="col">
                <h1 class="text-center">Your Results {{ $score }}/50</h1>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 gap-y-4 align-content-around">
            @php
                $n = 0;

            @endphp
            @unless (count($questions) == 0)
                @foreach ($questions as $question)
                    @php
                        $n++;
                        $icon = [
                            'A' => '<i class="bi bi-circle fs-3"></i>',
                            'B' => '<i class="bi bi-circle fs-3"></i>',
                            'C' => '<i class="bi bi-circle fs-3"></i>',
                            'grade' => 0,
                        ];

                        // Loop through the resultArray to find the result for the current question
                        foreach ($resultArray as $resultItem) {
                            if ($resultItem['question_id'] == $question->id) {
                                $result = $resultItem;
                                break; // Break out of the loop once the result is found
                            }
                        }
                        $icon['grade'] = $result['grade'];
                        // Check if the chosen option matches the correct answer
                        if ($result['chosen_option'] == $result['correct_answer']) {
                            $icon[$result['chosen_option']] =
                                '<i class="bi bi-check-circle-fill fs-3 text-success"></i>';
                        } else {
                            $icon[$result['chosen_option']] = '<i class="bi bi-x-circle-fill fs-3 text-danger "></i>';
                            $icon[$result['correct_answer']] = '<i class="bi bi-check-circle fs-3 text-success"></i>';
                        }
                    @endphp
                    {{-- @dd($icon) --}}
                    <div class="col ">
                        <x-result-card :question="$question" :n="$n" :icon="$icon" />
                    </div>
                @endforeach
            @else
                <div class="col">
                    <p>No questions yet!</p>
                </div>
            @endunless
        </div>
    </div>
</x-layout>
