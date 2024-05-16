<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center items-center gap-4 z-10">
            <div id="background-container" class="border px-4 py-2">
                <div class="flex items-center">
                    <div class="text-2xl" id="minutes">00</div>
                    <div class="text-2xl mx-1">:</div>
                    <div class="text-2xl" id="seconds">00</div>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="py-12 mt-28">
        <div class="mx-auto sm:px-2 lg:px-4">
            <div
                class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border grid grid-flow-row-dense grid-cols-3">
                @foreach ($questions as $question)
                    <x-question :question="$question" :manege="true" />
                @endforeach
            </div>
        </div>
        <div class="mx-auto sm:px-2 lg:px-4">
            <div class="py-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Section Title</h3>
            </div>
            <div
                class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border grid grid-flow-row-dense grid-cols-3">
                @foreach ($questions as $question)
                    <x-question :question="$question" />
                @endforeach
            </div>
        </div>
    </div>





</x-app-layout>
