<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center items-center gap-4 z-10">
            <div class="">
                <a href="{{ route('quiz.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Start the
                    Quiz</a>
            </div>
            <div class="">
                <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">See your
                    performance</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12 mt-28">
        <div class=" mx-auto text-s mt-2 sm:px-2 lg:px-4">
            <div class="   shadow-sm sm:rounded-lg border">

                <div class="row m-5">
                    A test is composed from 25 questions (by a computer, so each test is an original), each one has only
                    one correct answer (mostly from three - a,b,c; sometimes from two - a,b). A component question has
                    matched specific number of points. Maximum available number of points is 50. Minimum for succesfull
                    exam is 43 points.
                    You must make an exam with a court (official, authorized...) translator (interpreter). You can bring
                    (use a servis of) your known translator (if you know anybody). Or you can use a servis of one of
                    them I know. You need to negotiate his fee with him, it isn't a part of a price of a driving school.
                    He mustn't help you. You must know rules, principles, signs, crossroads, first aid... yourself!
                </div>
                <div class="flex w-4/5 justify-around p-3 border m-6 rounded-md">
                    <table class="w-full  text-left rtl:text-right ">
                        <thead class="text-xl text-center border-b-2">
                            <tr>
                                <th scope="col" class="px-2 py-2 rounded-s-lg">
                                    Index
                                </th>
                                <th scope="col" class="px-2 py-2">
                                    Description
                                </th>
                                <th scope="col" class="px-2 py-2 rounded-e-lg">
                                    Points
                                </th>
                                <th scope="col" class="px-2 py-2 rounded-e-lg">
                                    Number of questions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sections as $section)
                                <tr class=" ">
                                    <td class="p-1  text-wrap  ">
                                        {{ $section->id }}
                                    </td>
                                    <td class="p-1  ">
                                        {{ $section->name }}
                                    </td>
                                    <td class="p-1 text-center ">
                                        {{ $section->grade }}
                                    </td>
                                    <td class="p-1 text-center ">
                                        {{ $section->number }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                {{-- <form id="quizForm" method="post" action="{{ route('quiz.store') }}">

                    @csrf
                    @foreach ($sections as $section)
                        <div class="flex flex-col gap-2 border">
                            <div class="flex flex-row items-center">
                                <input type="radio" id="a" name="{{ $section->id }}" value="a"
                                    class="hidden">
                                <label for="a" class="flex items-center cursor-pointer">
                                    <!-- Font Awesome icon for unchecked state -->
                                    <div class="ml-2 text-gray-500 base">
                                        <i class="far fa-circle"></i>
                                    </div>
                                    <!-- Font Awesome icon for checked state -->
                                    <div class="ml-5 text-green-500 hidden selected">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div id="options" class="option">
                                        {{ $section->id }}
                                    </div>
                                </label>
                            </div>
                            <div class="flex flex-row items-center">
                                <input type="radio" id="b" name="{{ $section->id }}" value="b"
                                    class="hidden">
                                <label for="b" class="flex items-center cursor-pointer">
                                    <!-- Font Awesome icon for unchecked state -->
                                    <div class="ml-2 text-gray-500 base">
                                        <i class="far fa-circle"></i>
                                    </div>
                                    <!-- Font Awesome icon for checked state -->
                                    <div class="ml-5 text-green-500 hidden selected">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div id="options" class="option">
                                        {{ $section->id }}
                                    </div>
                                </label>
                            </div>
                            <div class="flex flex-row items-center">
                                <input type="radio" id="c" name="{{ $section->id }}" value="c"
                                    class="hidden">
                                <label for="c" class="flex items-center cursor-pointer">
                                    <!-- Font Awesome icon for unchecked state -->
                                    <div class="ml-2 text-gray-500 base">
                                        <i class="far fa-circle"></i>
                                    </div>
                                    <!-- Font Awesome icon for checked state -->
                                    <div class="ml-5 text-green-500 hidden selected">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div id="options" class="option">
                                        {{ $section->id }}
                                    </div>
                                </label>
                            </div>


                        </div>
                    @endforeach





                    <button id="submitBtn" type="submit" class="btn btn-primary">Submit Answers</button>
                </form> --}}



                <div class="row m-5">
                    There is possible to mark an answer (you think it's correct) either with the mouse on the
                    corresponding letter or with the corresponding key on the keyboard during the test. The test is
                    limited by time limit 30 minutes. Be careful with pressing a key "Enter", it can finish a test too
                    early.

                </div>

            </div>
        </div>
    </div>


</x-app-layout>
