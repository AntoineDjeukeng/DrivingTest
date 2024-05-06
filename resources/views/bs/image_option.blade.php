@php
    $tlist = ['a', 'b', 'c'];
@endphp
<div class="container ">
    <div class="row py-2 ">
        @for ($i = 0; $i < count($options); $i++)
            <div class="col text-center">
                <div class="col d-flex align-items-center justify-content-center">
                    <input class="form-check-input" type="radio" name="answers[{{ $options[$i]['id'] }}]"
                        value="{{ $options[$i]['name'] }}" id="{{ $tlist[$i] . $options[$i]['id'] }}">
                </div>
                <label class="form-check-label" for="{{ $tlist[$i] . $options[$i]['id'] }}">
                    <img src="{{ asset('storage/' . $options[$i]['value']) }}" alt="placeholder" class="img-fluid mt-2">
                </label>
            </div>
        @endfor
    </div>
</div>
