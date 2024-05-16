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
            <div class="">
                <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Start the
                    Quiz</a>
            </div>
            <div class="">
                <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">See your
                    performance</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12 mt-28">
        <div class="mx-auto sm:px-2 lg:px-4">
            <div
                class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border grid grid-flow-row-dense grid-cols-1 p-5">
                <div class="container mx-auto px-4 py-8">


                    <form id="quizForm" method="post" action="{{ route('quiz.store') }}">
                        @csrf
                        @php
                            $n = 0;
                        @endphp
                        <input type="hidden" name="recordId" value="{{ $recordId }}">
                        @foreach ($questions as $question)
                            @php
                                $n++;
                            @endphp
                            <x-quiz :question="$question" :n="$n" />
                        @endforeach
                        <button id="submitBtn" type="submit" class="btn btn-primary">Submit Answers</button>
                    </form>


                </div>
            </div>
        </div>

        <script>
            // Define the function to change background color
            const backgroundContainer = document.getElementById('background-container');

            let hue = 0; // Initial hue (red)
            let saturation = 100; // Saturation
            let lightness = 50; // Lightness

            function changeBackgroundColor() {
                // Calculate the percentage of time remaining
                let currentTime = new Date().getTime();
                let totalTime = targetTime - startDate;
                let remainingTime = targetTime - currentTime;
                let percentageRemaining = (remainingTime / totalTime) * 100;

                // Change background color based on the percentage remaining
                if (percentageRemaining <= 10) {
                    hue = 0; // Red
                } else if (percentageRemaining <= 40) {
                    hue = 60; // Yellow
                } else {
                    hue = 120; // Green
                }

                // Convert HSL values to CSS string
                let bgColor = `hsl(${hue}, ${saturation}%, ${lightness}%)`;

                // Update background color
                backgroundContainer.style.backgroundColor = bgColor;

                // Stop color change if time is up
                if (currentTime >= targetTime) {
                    clearInterval(colorInterval);
                }
            }

            let startDate = new Date().getTime(); // Start time
            let targetTime = startDate + (20 * 60 * 1000); // 10 seconds

            let colorInterval = setInterval(changeBackgroundColor, 100); // Change color every 100 milliseconds

            // Update countdown function
            function updateCountdown() {
                var currentTime = new Date().getTime();
                var diff = targetTime - currentTime;

                if (diff <= 0) {
                    clearInterval(countdown);
                    document.getElementById('minutes').innerHTML = "Time's up!";
                    document.getElementById('seconds').innerHTML = "";
                    document.getElementById('quizForm').submit();
                    clearInterval(colorInterval); // Stop background color transition
                    return;
                }

                var m = Math.floor(diff / (1000 * 60)) % 60;
                var s = Math.floor(diff / 1000) % 60;

                var minutesElement = document.getElementById('minutes');
                var secondsElement = document.getElementById('seconds');

                if (minutesElement && secondsElement) {
                    minutesElement.innerHTML = m;
                    secondsElement.innerHTML = s;
                }
            }

            var countdown = setInterval(updateCountdown, 1000); // Update countdown every second

            const options = document.querySelectorAll(".option");

            options.forEach((option) => {
                const V_option = option.parentElement;
                V_option.addEventListener("click", () => {
                    const name = V_option.parentElement.querySelector("input").id;
                    const parent = V_option.parentElement.parentElement;
                    const labels = parent.querySelectorAll('label');

                    labels.forEach(label => {
                        const input = label.parentElement.querySelector('input');
                        const htmlForValue = label.getAttribute('for');
                        const baseIcon = label.querySelector('.base');
                        const selectedIcon = label.querySelector('.selected');

                        if (htmlForValue === name) {
                            input.checked = true;
                            baseIcon.classList.add('hidden');
                            selectedIcon.classList.remove('hidden');
                        } else {
                            input.checked = false;
                            baseIcon.classList.remove('hidden');
                            selectedIcon.classList.add('hidden');
                        }
                    });

                });
            });
        </script>

</x-app-layout>
