<x-card>
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
            foreach ($list as $key => $value) {
                $options[] = [
                    'name' => $value,
                    'value' => $question->$value,
                ];
            }
        @endphp



        <div class="row justify-content-between">
            <div class="col ">
                <h2>Question : {{ $n }} </h2>
                <h2>Question grade: {{ $icon['grade'] }} </h2>
            </div>
            <div class="col-3 px-0">
                <h2>Law: {{ $question->law }}</h2>
            </div>
        </div>


        <div class="row py-2">
            <h4>
                {{ $question->question }}
            </h4>
        </div>
        @if ($withImage)
            <div class="row py-2">
                <div class="col text-center">
                    <img src="{{ asset('storage/' . $question->image) }}" alt="placeholderrr" class="img-fluid">
                </div>
            </div>
        @endif

        <div class="container ">
            <div class="row py-2 ">
                @foreach ($options as $option)
                    @if ($test)
                        <div class="col text-center">
                            <div class="col d-flex align-items-center justify-content-center">
                                {!! $icon[strtoupper($option['name'])] !!}
                            </div>
                            <img src="{{ asset('storage/' . $option['value']) }}" alt="placeholder"
                                class="img-fluid mt-4">
                        </div>
                        {{-- @dd($icon) --}}
                    @else
                        <div class="row option-card p-1 ">
                            <div class="col-1 px-0 d-flex align-items-center justify-content-center">
                                {!! $icon[strtoupper($option['name'])] !!}
                            </div>
                            <div class="col-11 ">
                                {{ $option['value'] }}
                            </div>
                        </div>
                        {{-- @dd($icon[strtoupper($option['name'])], $option, $question)y --}}
                    @endif
                @endforeach
            </div>
        </div>


    </div>
</x-card>
