<div
    class="gap-4 justify-center z-10 absolute hidden bottom-0 group-hover:block group-hover:bg-slate-400 dark:group-hover:bg-slate-100 hover:text-clip">
    <div class="flex flex-row gap-5">

        <div class="m-0 p-2">
            <a href="{{ route('questions.show', $question->id) }}" role="button"
                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">view</a>

        </div>
        <div class="m-0 p-2">
            <a href="{{ route('questions.edit', $question->id) }}" role="button"
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
