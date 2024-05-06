@php
    $tlist = ['a', 'b', 'c'];
@endphp
<div class="container ">
    <div class="row py-2 ">
        {{-- @dd($options) --}}
        @for ($i = 0; $i < count($options); $i++)
            <div class="row option-card p-1 ">
                <div class="col-1 px-0 d-flex align-items-center justify-content-center">
                    <input class="form-check-input" type="radio"
                        name="answers[{{ $options[$i]['id'] }}]"value="{{ $options[$i]['name'] }}"
                        id="{{ $tlist[$i] . $options[$i]['id'] }}">
                </div>
                <div class="col-11 ">
                    <label class="form-check-label" for="{{ $tlist[$i] . $options[$i]['id'] }}">
                        {{ $options[$i]['value'] }}
                    </label>
                </div>
            </div>
        @endfor
    </div>
</div>
