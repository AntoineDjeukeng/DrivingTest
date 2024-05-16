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
@endphp


@if ($img == 1)
    <div class="flex flex-row justify-around gap-2 p-2 ">
        <div class="flex flex-col gap-2 justify-center">
            <input type="radio" id="a" name="{{ $question->id }}" value="a" class="hidden">
            <label for="a" class="flex flex-col items-center cursor-pointer">
                <div class="ml-2 text-gray-500 base">
                    <i class="far fa-circle"></i>
                </div>
                <div class="ml-5 text-green-500 hidden selected">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div id="options" class="option pt-2">
                    <x-image-option :option="$question->a" />
                </div>
            </label>
        </div>
        <div class="flex flex-col gap-2 justify-center">
            <input type="radio" id="b" name="{{ $question->id }}" value="b" class="hidden">
            <label for="b" class="flex flex-col items-center cursor-pointer">
                <div class="ml-2 text-gray-500 base">
                    <i class="far fa-circle"></i>
                </div>
                <div class="ml-5 text-green-500 hidden selected">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div id="options" class="option pt-2">
                    <x-image-option :option="$question->b" />
                </div>
            </label>
        </div>
        <div class="flex flex-col gap-2 justify-center">
            <input type="radio" id="c" name="{{ $question->id }}" value="c" class="hidden">
            <label for="c" class="flex flex-col items-center cursor-pointer">
                <div class="ml-2 text-gray-500 base">
                    <i class="far fa-circle"></i>
                </div>
                <div class="ml-5 text-green-500 hidden selected">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div id="options" class="option pt-2">
                    <x-image-option :option="$question->c" />
                </div>
            </label>
        </div>

    </div>
@elseif ($img == 0 && $l == 0)
    <div class="flex flex-row justify-around gap-2 p-2 ">
        <div class="flex flex-col gap-2 justify-center">
            <input type="radio" id="a" name="{{ $question->id }}" value="a" class="hidden">
            <label for="a" class="flex flex-col items-center cursor-pointer">
                <div class="ml-2 text-gray-500 base">
                    <i class="far fa-circle"></i>
                </div>
                <div class="ml-5 text-green-500 hidden selected">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div id="options" class="option pt-2">
                    <x-option :option="$question->a" />
                </div>
            </label>
        </div>
        <div class="flex flex-col gap-2 justify-center">
            <input type="radio" id="b" name="{{ $question->id }}" value="b" class="hidden">
            <label for="b" class="flex flex-col items-center cursor-pointer">
                <div class="ml-2 text-gray-500 base">
                    <i class="far fa-circle"></i>
                </div>
                <div class="ml-5 text-green-500 hidden selected">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div id="options" class="option pt-2">
                    <x-option :option="$question->b" />
                </div>
            </label>
        </div>
        <div class="flex flex-col gap-2 justify-center">
            @if ($c == 1)
                <input type="radio" id="c" name="{{ $question->id }}" value="c" class="hidden">
                <label for="c" class="flex flex-col items-center cursor-pointer">
                    <div class="ml-2 text-gray-500 base">
                        <i class="far fa-circle"></i>
                    </div>
                    <div class="ml-5 text-green-500 hidden selected">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div id="options" class="option pt-2">
                        <x-option :option="$question->c" />
                    </div>
                </label>
            @endif
        </div>

    </div>
@elseif ($img == 0 && $l == 1)
    <div class="flex flex-col gap-2 border">
        <div class="flex flex-row items-center">
            <input type="radio" id="a" name="{{ $question->id }}" value="a" class="hidden">
            <label for="a" class="flex items-center cursor-pointer">
                <div class="ml-2 text-gray-500 base">
                    <i class="far fa-circle"></i>
                </div>
                <div class="ml-5 text-green-500 hidden selected">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div id="options" class="option pl-2">
                    <x-option :option="$question->a" />
                </div>
            </label>
        </div>
        <div class="flex flex-row items-center">
            <input type="radio" id="b" name="{{ $question->id }}" value="b" class="hidden">
            <label for="b" class="flex items-center cursor-pointer">
                <div class="ml-2 text-gray-500 base">
                    <i class="far fa-circle"></i>
                </div>
                <div class="ml-5 text-green-500 hidden selected">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div id="options" class="option pl-2">
                    <x-option :option="$question->b" />
                </div>
            </label>
        </div>
        <div class="flex flex-row items-center">
            @if ($c == 1)
                <input type="radio" id="c" name="{{ $question->id }}" value="c" class="hidden">
                <label for="c" class="flex items-center cursor-pointer">
                    <div class="ml-2 text-gray-500 base">
                        <i class="far fa-circle"></i>
                    </div>
                    <div class="ml-5 text-green-500 hidden selected">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div id="options" class="option pl-2">
                        <x-option :option="$question->c" />
                    </div>
                </label>
            @endif
        </div>


    </div>


@endif
