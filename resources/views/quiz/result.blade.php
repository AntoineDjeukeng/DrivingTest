{{-- @dd($results) --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center items-center gap-4 z-10">

            <div class="">
                <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Start the
                    Quiz</a>
            </div>
            <div class="">
                <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">See your
                    performance</a>
            </div>
            <div class="">
                your score is {{ $results['score'] }}
            </div>
        </div>
    </x-slot>
    <div class="py-12 mt-28">
        <div class="mx-auto sm:px-2 lg:px-4">
            <div
                class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border grid grid-flow-row-dense grid-cols-1 p-5">
                <div class="container mx-auto px-4 py-8">


                    @php

                        $results = $results['results'];
                    @endphp
                    @foreach ($results as $result)
                        <x-result :result="$result" />
                    @endforeach


                </div>
            </div>
        </div>



</x-app-layout>
