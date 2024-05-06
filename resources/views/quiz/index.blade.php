<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row justify-content-center mx-2 bg-secondary position-fixed">
            <div class="col-auto p-2">
                <div id="minutes" class="text-center text-white h2"></div>
            </div>
            <div class="col-auto p-2">
                <div id="seconds" class="text-center text-white h2"></div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 ">
        <div class=" mx-auto sm:px-2 lg:px-4">
            <div
                class="  dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border grid grid-flow-row-dense grid-cols-3">

                @foreach ($questions as $question)
                    <x-question :question="$question" :manege="true" />
                @endforeach
            </div>
        </div>
        <div class=" mx-auto sm:px-2 lg:px-4">
            <div class="py-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Section Title</h3>
            </div>
            <div
                class="  dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border grid grid-flow-row-dense grid-cols-3">

                @foreach ($questions as $question)
                    <x-question :question="$question" />
                @endforeach
            </div>
        </div>

    </div>
    {{-- <div class="container form-check mb-5">
        <form id="quizForm" method="post" action=" {{ route('quiz.submit') }}">

            @csrf 
            @php
                $n = 0;
            @endphp
            @foreach ($questions as $question)
                @php
                    $n++;
                @endphp


                
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
    </div> --}}

    {{-- <script>
        // Set the countdown duration in minutes
        const countdownDuration = 35;

        // Calculate the end time by adding the duration to the current time
        const endTime = new Date();
        endTime.setMinutes(endTime.getMinutes() + countdownDuration);

        // Update the countdown every second
        const countdownTimer = setInterval(updateCountdown, 1000);

        function updateCountdown() {
            // Get the current time
            const currentTime = new Date();

            // Calculate the remaining time in seconds
            const remainingTime = Math.floor((endTime - currentTime) / 1000);

            // Check if the countdown has ended
            if (remainingTime <= 0) {
                clearInterval(countdownTimer);
                // Perform any actions when the countdown ends
                // For example, redirect to another page or show a message
                // window.location.href = "https://example.com";
                // alert("Countdown has ended!");
                return;
            }

            // Calculate the remaining minutes and seconds
            const minutes = Math.floor(remainingTime / 60);
            const seconds = remainingTime % 60;

            // Display the remaining time in the page
            document.getElementById("countdown").textContent = `${minutes}:${seconds.toString().padStart(2, "0")}`;
        }
    </script> --}}
    <script>
        var currentDate = parseInt("{{ $time }}") * 1000; // Convert seconds to milliseconds

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
</x-app-layout>
