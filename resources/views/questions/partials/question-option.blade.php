@if ($option)
    <div class="p-2 text-center">
        {{ $name }}
    </div>
    <div class=" justify-contente-center align-items-center">
        @if (Str::endsWith($option, ['.jpg', '.jpeg', '.png', '.gif']))
            <img src="{{ asset('storage/' . $option) }}" alt="image" class=" w-20">
        @else
            {{ $option }}
        @endif
    </div>

@endif
