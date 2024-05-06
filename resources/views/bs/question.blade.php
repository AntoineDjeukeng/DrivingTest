<div class="mx-4 form-check border">
    @php
        $type = $question->type;
        if ($type > 3) {
            $withImage = true;
        } else {
            $withImage = false;
        }
        if ($type == 3) {
            $test = true;
        } else {
            $test = false;
        }
        if ($type == 1 || $type == 4 || $type == 6) {
            $list = ['a', 'b'];
        } else {
            $list = ['a', 'b', 'c'];
        }
        shuffle($list);
        foreach ($list as $key => $value) {
            $options[] = [
                'name' => $value,
                'value' => $question->$value,
            ];
        }
    @endphp


    <div class="row justify-content-between">
        <div class="col ">
            <h2>Question : {{ $question->code }}, {{ $question->type }} </h2>
        </div>
        <div class="col-3 px-0">
            <h2> {{ strtoupper($question->answer) }}</h2>
        </div>
    </div>
    <div class="row py-2">
        <h4>
            <a href="/questions/{{ $question->id }}/show" class="btn btn-primary">{{ $question->question }}</a>

        </h4>
    </div>
    @if ($withImage)
        <div class="row py-2">
            <div class="col text-center">
                <img src="{{ asset('storage/' . $question['image']) }}" alt="placeholderrr" class="img-fluid">
            </div>
        </div>
    @endif



    <div class="container ">
        <div class="row py-2 ">

            @if ($test)
                <x-image :options="$options" />
            @else
                <x-text :options="$options" />
            @endif
        </div>
    </div>


</div>
