<section class="space-y-6">

    <!-- Change the button to open the modal -->
    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Delete') }}
    </x-danger-button>

    <!-- Adjust the modal to open only on click -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('questions.destroy', $question) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this question?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once the question is deleted, all of its resources and data will be permanently deleted.') }}
            </p>
            <div class="mt-6 flex justify-end">
                <!-- Close the modal on cancel button click -->
                <x-secondary-button x-on:click="$dispatch('close-modal', 'confirm-user-deletion')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <!-- Submit the form on delete button click -->
                <x-danger-button type="submit" class="ms-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
