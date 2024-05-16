@php
    use Illuminate\Support\Str;

    if (Str::endsWith($question->a, ['.jpg', '.jpeg', '.png', '.gif'])) {
        $img = 1;
    } else {
        $img = 0;
    }
    $wordCoun_a = str_word_count($question->a);
    $wordCoun_b = str_word_count($question->b);
    $wordCoun_c = str_word_count($question->c);
    $wordCount = max($wordCoun_a, $wordCoun_b, $wordCoun_c);
    if ($wordCount > 7) {
        $l = 1;
    } else {
        $l = 0;
    }

    if ($question->c != null && $question->c != '') {
        $c = 1;
    } else {
        $c = 0;
    }
    $correct = $result['correct_answer'];
    $answer = $result['answer'];

    $icons = [];
    if (Str::upper($answer) == Str::upper($correct)) {
        foreach (['a', 'b', 'c'] as $option) {
            if (Str::upper($option) == Str::upper($correct)) {
                $icons[$option] = 'icon_vs';
            } else {
                $icons[$option] = 'icon_fn';
            }
        }
    } else {
        foreach (['a', 'b', 'c'] as $option) {
            if (Str::upper($option) == Str::upper($correct)) {
                $icons[$option] = 'icon_vn';
            } elseif (Str::upper($option) == Str::upper($answer)) {
                $icons[$option] = 'icon_fs';
            } else {
                $icons[$option] = 'icon_fn';
            }
        }
    }
    // dd($icons);
@endphp


@if ($img == 1)
    <div class="flex flex-row justify-around gap-2 p-2 ">
        <div class="flex flex-col gap-2 justify-center">
            <div class="flex flex-col items-center cursor-pointer">
                @include('quiz.partials.' . $icons['a'])
                <div class="option pt-2">
                    <x-image-option :option="$question->a" />
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-2 justify-center">
            <div class="flex flex-col items-center cursor-pointer">
                @include('quiz.partials.' . $icons['b'])
                <div class="option pt-2">
                    <x-image-option :option="$question->b" />
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-2 justify-center">
            <div class="flex flex-col items-center cursor-pointer">
                @include('quiz.partials.' . $icons['c'])
                <div class="option pt-2">
                    <x-image-option :option="$question->c" />
                </div>
            </div>
        </div>

    </div>
@elseif ($img == 0 && $l == 0)
    <div class="flex flex-row justify-around gap-2 p-2 ">
        <div class="flex flex-col gap-2 justify-center">
            <div class="flex flex-col items-center cursor-pointer">
                @include('quiz.partials.' . $icons['a'])
                <div class="option pt-2">
                    <x-option :option="$question->a" />
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-2 justify-center">
            <label class="flex flex-col items-center cursor-pointer">
                @include('quiz.partials.' . $icons['b'])
                <div class="option pt-2">
                    <x-option :option="$question->b" />
                </div>
            </label>
        </div>
        <div class="flex flex-col gap-2 justify-center">
            @if ($c == 1)
                <div class="flex flex-col items-center cursor-pointer">
                    @include('quiz.partials.' . $icons['c'])

                    <div class="option pt-2">
                        <x-option :option="$question->c" />
                    </div>
                </div>
            @endif
        </div>

    </div>
@elseif ($img == 0 && $l == 1)
    <div class="flex flex-col gap-2 border">
        <div class="flex flex-row items-center">
            <div class="flex items-center cursor-pointer">
                @include('quiz.partials.' . $icons['a'])
                <div class="option pl-2">
                    <x-option :option="$question->a" />
                </div>
            </div>
        </div>
        <div class="flex flex-row items-center">
            <div class="flex items-center cursor-pointer">
                @include('quiz.partials.' . $icons['b'])
                <div class="option pl-2">
                    <x-option :option="$question->b" />
                </div>
            </div>
        </div>
        <div class="flex flex-row items-center">
            @if ($c == 1)
                <div class="flex items-center cursor-pointer">
                    @include('quiz.partials.' . $icons['c'])

                    <div class="option pl-2">
                        <x-option :option="$question->c" />
                    </div>
                </div>
            @endif
        </div>


    </div>


@endif
