<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Edit the question') }}
        </h2>
    </x-slot>

    <div class="py-2 mt-24">
        <div class=" mx-auto mt-2 sm:px-2 lg:px-4">
            <div class="   shadow-sm sm:rounded-lg -mt-15">


                {{-- @dd($question) --}}
                @php
                    $images = [];
                    $texts = [];
                    $t = 1;
                    foreach (['a', 'b', 'c'] as $option) {
                        $imagePath = 'storage/' . $question->$option;
                        if (is_file(public_path($imagePath))) {
                            $t = 0;
                            $images[$option] = asset($imagePath);
                            $texts[$option] = '';
                        } else {
                            $images[$option] = '';
                            $texts[$option] = $question->$option;
                        }
                    }
                @endphp


                {{-- @dd($images, $texts) --}}


                <form action="{{ route('questions.update', $question) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid my-3   gap-4 place-content-evenly text-black dark:text-slate-50  ">
                        <div class="border dark:bg-gray-800 p-4 rounded-xl">


                            <div class="grid sm:grid-cols-3 grid-cols-1 gap-4 ">
                                <div class="mb-3">
                                    <div class="relative ">
                                        <input type="text" class="form-input block w-full pl-8 dark:bg-black"
                                            id="code" name="code" value="{{ $question->code }}" placeholder=" ">
                                        <label for="code" class="form-label absolute top-1 left-2 ">Code</label>
                                    </div>
                                    @error('code')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="relative">
                                        <input type="text" class="form-input block w-full pl-8 dark:bg-black"
                                            id="law" name="law" value="{{ $question->law }}" placeholder=" ">

                                        <label for="law" class="form-label absolute top-1 left-2 ">Law</label>
                                    </div>
                                    @error('law')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="relative">
                                        <select class="form-select block w-full pl-8 pr-2 dark:bg-black"
                                            id="inputGroupSelect01" aria-label="Select answer" name="answer" required>
                                            <option selected disabled>Answer...</option>
                                            @foreach (['A', 'B', 'C'] as $answer)
                                                <option value="{{ $answer }}"
                                                    {{ $question->answer == $answer ? 'selected' : '' }}>
                                                    {{ $answer }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="inputGroupSelect01"
                                            class="form-label absolute top-1 left-2 "></label>
                                    </div>
                                    @error('answer')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="relative">
                                    <select class="form-select bg-black" id="inputGroupSelect02"
                                        aria-label="Select section" name="section_id">
                                        <option selected disabled @required(true)>Section...</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}"
                                                {{ $question->section_id == $section->id ? 'selected' : '' }}>
                                                {{ Str::limit($section->name, $limit = 50) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="section_id"
                                        class="form-label absolute top-1 left-2 text-gray-500 dark:text-gray-400"></label>
                                </div>
                                @error('section_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-1 relative">
                                <input type="text"
                                    class="form-input block w-full pl-8 pr-2 dark:bg-black focus:outline-none focus:ring focus:border-blue-300"
                                    id="question" name="question" value="{{ $question->question }}" placeholder=" ">
                                <label for="question"
                                    class="form-label absolute left-2 text-gray-500 dark:text-gray-400 transition-all duration-300 top-1"
                                    id="question-label">Question</label>
                                @error('question')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid sm:grid-cols-2 grid-cols-1 gap-4 ">
                                <div class="mb-3">
                                    <h1>Image</h1>
                                    <div class="relative text-black">
                                        <input type="file"
                                            class="form-input block w-full pl-8 dark:bg-black dark:text-white"
                                            id="image" name="image" value="{{ old('image') }}" placeholder=" ">
                                        <label for="image"
                                            class="form-label absolute top-1 left-2 text-gray-500 dark:text-gray-400">
                                        </label>
                                    </div>
                                    <img id="imagePreview" class="hidden" src="#" alt="Preview">
                                    @if (is_file(public_path('storage/' . $question->image)))
                                        <img id="From_database" src="{{ asset('storage/' . $question->image) }}"
                                            alt="Image" class="">
                                    @endif

                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <h1 class="pl-4">Option type</h1>
                                    <div class="relative " id="OptionT">
                                        <select class="form-select block w-full pl-8 pr-2  dark:bg-black"
                                            id="inputGroupSelect03" aria-label="Select Toption" name="Toption">
                                            <option selected disabled>Choose...</option>

                                            <option value="1" {{ old('Toption') == '1' ? 'selected' : '' }}>
                                                Texts
                                            </option>
                                            <option value="0" {{ old('Toption') == '0' ? 'selected' : '' }}>
                                                Images
                                            </option>

                                        </select>
                                        <label for="inputGroupSelect03"
                                            class="form-label absolute top-1 left-2 text-gray-500 dark:text-gray-400"></label>
                                    </div>
                                    @error('Toption')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-4 border" id="options">
                                <div class="" id="texts">

                                    <div class="relative">
                                        <input type="text" class="form-input block w-full pl-8 dark:bg-black"
                                            id="text_a" name="text_a" value="{{ $texts['a'] }}"
                                            placeholder=" ">
                                        <label for="text_a" class="form-label absolute top-1 left-2 ">Option
                                            A</label>

                                    </div>
                                    @error('text_a')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="relative">
                                        @if ($t == 1)
                                            <input type="text" class="form-input block w-full pl-8 dark:bg-black"
                                                id="text_b" name="text_b" value="{{ $texts['b'] }}"
                                                placeholder=" ">
                                        @else
                                            <input type="text" class="form-input block w-full pl-8 dark:bg-black"
                                                id="text_b" name="text_b" value="{{ old('text_b') }}"
                                                placeholder=" ">
                                        @endif

                                        <label for="text_b" class="form-label absolute top-1 left-2 ">Option
                                            B</label>

                                    </div>
                                    @error('text_b')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="relative">
                                        @if ($t == 1)
                                            <input type="text" class="form-input block w-full pl-8 dark:bg-black"
                                                id="text_c" name="text_c" value="{{ $texts['c'] }}"
                                                placeholder=" ">
                                        @else
                                            <input type="text" class="form-input block w-full pl-8 dark:bg-black"
                                                id="text_c" name="text_c" value="{{ old('text_c') }}"
                                                placeholder=" ">
                                        @endif
                                        <label for="text_c" class="form-label absolute top-1 left-2 ">Option
                                            C</label>
                                    </div>
                                    @error('text_c')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="flex flex-row flex-wrap justify-around   hover:space-x-8 " id="images">
                                    <div class="flex-none max-w-64">
                                        <input type="file" class="form-input block w-full pl-8 dark:bg-black"
                                            id="image_a" name="image_a" value="{{ old('image_a') }}"
                                            placeholder=" ">
                                        <label for="image_a" class="form-label absolute top-1 left-2 "></label>
                                        <img id="image_aPreview" class="hidden" src="#" alt="Preview">
                                        @if ($t == 0)
                                            <img id="From_database_a" src="{{ $images['a'] }}" alt="Image"
                                                class="">
                                        @endif
                                        @error('image_a')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex-none max-w-64">
                                        <input type="file" class="form-input block w-full pl-8 dark:bg-black"
                                            id="image_b" name="image_b" value="{{ old('image_b') }}"
                                            placeholder=" ">
                                        <label for="image_b" class="form-label absolute top-1 left-2 "></label>
                                        @if ($t == 0)
                                            <img id="From_database_b" src="{{ $images['b'] }}" alt="Image"
                                                class="">
                                        @endif
                                        <img id="image_bPreview" class="hidden" src="#" alt="Preview">
                                        @error('image_b')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex-none max-w-64">
                                        <input type="file" class="form-input block w-full pl-8 dark:bg-black"
                                            id="image_c" name="image_c" value="{{ old('image_c') }}"
                                            placeholder=" ">
                                        <label for="image_c" class="form-label absolute top-1 left-2 "></label>
                                        @if ($t == 0)
                                            <img id="From_database_c" src="{{ $images['c'] }}" alt="Image"
                                                class="">
                                        @endif
                                        <img id="image_cPreview" class="hidden" src="#" alt="Preview">
                                        @error('image_c')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                            </div>


                            <div class="flex justify-end mt-1">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md">Submit</button>
                            </div>

                        </div>


                    </div>
                </form>


            </div>
        </div>

    </div>


    <script>
        const inputs = document.querySelectorAll('input[type="text"]');

        // console.log(inputs);
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.nextElementSibling.classList.add('top-0', '-translate-y-2', 'text-sm');
            });

            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.nextElementSibling.classList.remove('top-0', '-translate-y-2', 'text-sm');
                }
            });
        });
        // Select all file input elements
        const fileInputs = document.querySelectorAll('input[type="file"]');
        window.addEventListener('beforeunload', function() {
            sessionStorage.clear();
        });
        // Iterate over each file input
        fileInputs.forEach(fileInput => {
            const inputId = fileInput.id;

            // Check if there is a saved image data in the storage
            const imageData = sessionStorage.getItem(inputId);
            if (imageData) {
                // Display the saved image data
                const imgPreview = document.getElementById(inputId + 'Preview');
                imgPreview.src = imageData;
                imgPreview.classList.remove('hidden');
            }

            // Add change event listener to each file input
            fileInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                const reader = new FileReader();

                // Read the file and display the image preview
                reader.onload = function(event) {
                    const imgPreview = document.getElementById(inputId + 'Preview');
                    imgPreview.src = event.target.result;
                    imgPreview.classList.remove('hidden');


                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            });
        });
        // Select the relevant elements

        const texts = document.getElementById('texts');
        const images = document.getElementById('images');
        const fileInputImage = document.getElementById('image');
        const OptionT = document.getElementById('inputGroupSelect03');
        var test = 1;





        OptionT.addEventListener('change', function() {
            if (test == 1) {
                changeOption();
            }
        });



        // Add change event listener to the file input of type "image"
        fileInputImage.addEventListener('change', function(event) {
            // Check if a file is selected
            if (event.target.files.length > 0) {
                OptionT.value = 1;
                changeOption();
                test = 0;
                const imgPreviews = document.querySelectorAll('.image-preview');
                imgPreviews.forEach(imgPreview => {
                    imgPreview.src = '';
                });
            }
        });

        function changeOption() {
            if (OptionT.value == 1) {
                texts.classList.remove('hidden');
                images.classList.add('hidden');
                // i want to select input image_a, image_b, image_c
                const A = document.querySelectorAll(
                    'input[name^="image_a"], input[name^="image_b"], input[name^="image_c"]');
                A.forEach(a => {
                    a.value = '';
                });

            } else {
                texts.classList.add('hidden');
                images.classList.remove('hidden');
                // i want to select input text_a, text_b, text_c
                const T = document.querySelectorAll(
                    'input[name^="text_a"], input[name^="text_b"], input[name^="text_c"]');
                T.forEach(t => {
                    t.value = '';
                });
            }
        }
        const imageInput = document.querySelectorAll('input[type="file"]');
        const fromDatabaseIds = ['From_database', 'From_database_a', 'From_database_b', 'From_database_c'];

        imageInput.forEach(input => {
            input.addEventListener('change', function(event) {
                // Check if a file is selected
                if (event.target.files.length > 0) {
                    // Loop through the array of IDs and add 'hidden' class to each element
                    fromDatabaseIds.forEach(id => {
                        const element = document.getElementById(id);
                        if (element) {
                            element.classList.add('hidden');
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>
