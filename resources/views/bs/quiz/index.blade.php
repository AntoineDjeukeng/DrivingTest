<x-layout>
    <x-card>
        <a href="/" class="inline-block text-black ml-4 mb-4 mt-5">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>

        <div class="row justify-content-center mx-2 bg-secondary position-fixed">
            <div class="col-auto p-2">
                <div id="minutes" class="text-center text-white h2"></div>
            </div>
            <div class="col-auto p-2">
                <div id="seconds" class="text-center text-white h2"></div>
            </div>
        </div>


        <div class="container form-check mb-5">
            <form id="quizForm" method="post" action=" {{ route('quiz.submit') }}">

                @csrf <!-- CSRF token outside the loop -->
                @php
                    $n = 0;
                @endphp
                @foreach ($questions as $question)
                    @php
                        $n++;
                    @endphp


                    {{-- @dd($question['id']) --}}
                    <input type="hidden" name="answers[{{ $question['id'] }}]" value="">
                    <x-quiz-card :question="$question" :n="$n" />
                @endforeach
                <div class="row justify-content-between mx-2 position-fixed"
                    style="bottom: 60px; right: 20px; left: 20px;">
                    <div class="col-auto">
                        <a href=" {{ route('quiz.stop') }}" class="btn btn-danger" role="button">End the Quiz</a>
                    </div>
                    <div class="col-auto">
                        <button id="submitBtnRight" type="submit" class="btn btn-primary">Submit Answers</button>
                    </div>
                </div>

            </form>
        </div>


        {{-- <script src="{{ asset('js/time.js') }}"></script> --}}
        <script>
            var currentDate = parseInt("{{ $currentDate }}") * 1000; // Convert seconds to milliseconds

            // Calculate the target time by adding 25 minutes (in milliseconds)
            var targetTime = currentDate + (25 * 60 * 1000); // 25 minutes

            // Call updateCountdown function every second
            var countdown = setInterval(updateCountdown, 1000);

            function updateCountdown() {
                // Get the current date and time
                var currentTime = new Date().getTime();

                // Calculate the difference between target time and current time
                var diff = targetTime - currentTime;

                // Check if the countdown has reached zero
                if (diff <= 0) {
                    // Display "Time's up!" or take appropriate action
                    clearInterval(countdown);
                    document.getElementById('minutes').innerHTML = "Time's up!";
                    document.getElementById('seconds').innerHTML = "";

                    // Automatically submit the form when time is up
                    document.getElementById('quizForm').submit();
                    return;
                }

                // Calculate minutes and seconds
                var m = Math.floor(diff / (1000 * 60)) % 60;
                var s = Math.floor(diff / 1000) % 60;

                // Get the elements for minutes and seconds
                var minutesElement = document.getElementById('minutes');
                var secondsElement = document.getElementById('seconds');

                // Check if the elements exist before updating
                if (minutesElement && secondsElement) {
                    // Update the content of minutes and seconds
                    minutesElement.innerHTML = m;
                    secondsElement.innerHTML = s;
                }
            }
        </script>
    </x-card>
</x-layout>
