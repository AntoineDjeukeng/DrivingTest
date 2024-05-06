@php
    use Illuminate\Support\Str;

    if (Str::endsWith($question->a, ['.jpg', '.jpeg', '.png', '.gif'])) {
        $img = 1;
    } else {
        $img = 0;
    }
    $wordCount = str_word_count($question->a);
    if ($wordCount > 8) {
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
    <div class="grid gap-2 p-2 ">
        <div class="grid grid-cols-3 gap-2 place-items-center">
            <div class="">a</div>
            <div class="">b </div>
            <div class="">c</div>
        </div>
        <div class="grid grid-cols-3 gap-2 place-items-center">
            <x-image-option :option="$question->a" />
            <x-image-option :option="$question->b" />
            <x-image-option :option="$question->c" />
        </div>

    </div>
@elseif ($img == 0 && ($l == 0 || $c == 0))
    <div class="grid gap-2 p-2 bg ">
        <div class="grid grid-cols-3 gap-2 place-items-center">
            <div class="">a</div>
            <div class="">b </div>
            @if ($c == 1)
                <div class="">c</div>
            @endif
        </div>
        <div class="grid grid-cols-3 gap-2">
            <x-option :option="$question->a" />
            <x-option :option="$question->b" />
            @if ($c == 1)
                <x-option :option="$question->c" />
            @endif
        </div>

    </div>
@elseif ($img == 0 && $l == 1 && $c == 1)
    {{-- <div class="grid grid-rows-2 grid-cols-8 gap-2 p-2">
        <div class="grid gap-2 place-items-center">
            <div class="m-0">a</div>
            <div class="m-0">b</div>
            <div class="m-0">c</div>
        </div>
        <div class="grid col-span-7 gap-2">
            <x-option :option="$question->a" />
            <x-option :option="$question->a" />
            <x-option :option="$question->c" />
        </div>
    </div> --}}
    <div class="flex flex-col gap-2">
        <div class="flex flex-row items-center">
            <div class="mr-2">a</div>
            <div>
                <x-option :option="$question->a" />
            </div>
        </div>
        <div class="flex flex-row items-center">
            <div class="mr-2">b</div>
            <div>
                <x-option :option="$question->b" />
            </div>
        </div>
        <div class="flex flex-row items-center">
            <div class="mr-2">c</div>
            <div>
                <x-option :option="$question->c" />
            </div>
        </div>
    </div>



@endif
