<div class="container ">
    <div class="row py-2 ">
        @foreach ($options as $option)
            <div class="col text-center">
                <div class="col d-flex align-items-center justify-content-center">
                    {{ $option['name'] }}
                </div>
                <img src="{{ asset('storage/' . $option['value']) }}" alt="placeholder" class="img-fluid mt-4">
            </div>
        @endforeach

    </div>
</div>
