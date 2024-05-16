<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show') }}
        </h2>
    </x-slot> --}}

    <div class="py-12 w-100 pt-16">
        <div class=" flex justify-center  mt-2 sm:px-2 lg:px-4 ">
            <div class=" basis-3/5  shadow-sm sm:rounded-lg -mt-15  border  p-5 ">


                <div class="flex flex-col place-content-evenly text-black dark:text-slate-50 ">

                    <div class="flex flex-row flex-wrap justify-around gap-5 ">
                        <div class="flex flex-col">
                            <div class="">
                                <span class="text-2xl">Code:</span>
                            </div>
                            <div class="ml-2">
                                <span>{{ $question->code }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="">
                                <span class="text-2xl">Low:</span>
                            </div>
                            <div class="ml-2">
                                <span>{{ $question->low }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="">
                                <span class="text-2xl">Answer:</span>
                            </div>
                            <div class="text-center">
                                <span>{{ $question->answer }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="">
                                <span class="text-2xl">Section:</span>
                            </div>
                            <div class="text-center pt-2" id="section_id">
                                <p href=""
                                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm -px-3 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                    {{ $question->section_id }}</p>

                            </div>
                        </div>

                    </div>
                    <div class=" border my-3 hidden max-w-4xl" id="section">
                        <h1 class="text-2xl">Section: {{ $section->name }}</h1>
                        <p> Number of question in the exam : {{ $section->number }}</p>
                        <p> Number grade per question : {{ $section->grade }}</p>

                    </div>
                    <div class="flex flex-col">
                        <div class="">
                            <span class="text-2xl">Question:</span>
                        </div>
                        <div class="ml-2">
                            <span>{{ $question->question }}</span>
                        </div>

                    </div>
                    @if ($question->image)
                        <div class="flex justify-center fluid m-5">
                            <img src="{{ asset('storage/' . $question->image) }}" alt="image" class=" rounded-lg">
                        </div>
                    @endif

                    <div class=" flex gap-4 py-5 justify-around " id="options">
                        @if (!is_file(public_path('storage/' . $question->a)))
                            <div
                                class="flex flex-col  flex-wrap  rounded-md p-2 m-0 hover:bg-gray-400 hover:text-green-900 border border-x-2 border-y-0">
                                <div class="flex justify-center ">
                                    <div class="border px-3 text-center text-xl rounded-md">A</div>
                                </div>
                                <div class=" pt-1">
                                    <span>{{ $question->a }}</span>
                                </div>
                            </div>
                            <div
                                class="flex flex-col  flex-wrap  rounded-md p-2 m-0 hover:bg-gray-400 hover:text-green-900 border border-x-2 border-y-0">
                                <div class="flex justify-center ">
                                    <div class="border px-3 text-center text-xl rounded-md">B</div>
                                </div>
                                <div class=" pt-1">
                                    <span>{{ $question->b }}</span>
                                </div>
                            </div>


                            @if ($question->c != null || $question->c != '')
                                <div
                                    class="flex flex-col  flex-wrap  rounded-md p-2 m-0 hover:bg-gray-400 hover:text-green-900 border border-x-2 border-y-0">
                                    <div class="flex justify-center ">
                                        <div class="border px-3 text-center text-xl rounded-md">C</div>
                                    </div>
                                    <div class=" pt-1">
                                        <span>{{ $question->c }}</span>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="flex flex-col flex-wrap border rounded-md p-2 m-0 hover:bg-gray-400 hover:text-green-900"
                                id="images">
                                <div class="text-center mb-2">a</div>
                                <div class="">
                                    <img id="From_database_a" src="{{ asset('storage/' . $question->a) }}"
                                        alt="Image" class="rounded-md p-1">
                                </div>
                            </div>
                            <div class="flex flex-col flex-wrap border rounded-md p-2 m-0 hover:bg-gray-400 hover:text-green-900"
                                id="images">
                                <div class="text-center mb-2">b</div>
                                <div class="">
                                    <img id="From_database_a" src="{{ asset('storage/' . $question->b) }}"
                                        alt="Image" class="rounded-md p-1">
                                </div>
                            </div>
                            <div class="flex flex-col flex-wrap border rounded-md p-2 m-0 hover:bg-gray-400 hover:text-green-900"
                                id="images">
                                <div class="text-center mb-2">c</div>
                                <div class="">
                                    <img id="From_database_a" src="{{ asset('storage/' . $question->c) }}"
                                        alt="Image" class="rounded-md p-1">
                                </div>
                            </div>
                    </div>
                    @endif

                </div>




                <div class="flex py-2 border-t-2">
                    <div class="m-0 self-center">
                        <a href="{{ route('questions.edit', $question) }}" role="button"
                            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Edit</a>

                    </div>



                    <div class="m-0 p-2">
                        <div class="max-w-xl">
                            @include('questions.partials.delete-question-form', [
                                'question' => $question->id,
                            ])
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
    <script>
        const section = document.getElementById('section_id');
        const section_id = document.getElementById('section');

        section.addEventListener('mouseover', () => {
            section_id.classList.remove('hidden');
        });

        section.addEventListener('mouseout', () => {
            section_id.classList.add('hidden');
        });
    </script>

</x-app-layout>
