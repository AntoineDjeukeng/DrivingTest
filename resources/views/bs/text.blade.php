<div class="container ">
    <div class="row py-2 ">
        @foreach ($options as $option)
            <div class="row option-card p-1 ">
                <div class="col-1 px-0 d-flex align-items-center justify-content-center">
                    {{ $option['name'] }}
                </div>
                <div class="col-11 ">
                    {{ $option['value'] }}
                </div>
            </div>
        @endforeach

    </div>
</div>
