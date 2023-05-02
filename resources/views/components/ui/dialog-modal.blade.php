@props(['id' => null, 'maxWidth' => null])

<x-ui.modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="flex items-center justify-between text-lg">

            <div class="flex items-center">
                {{ $title }}
            </div>

            <svg x-on:click.stop="show = false" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:text-gray-600 hover:cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>

        <div class="mt-4 text-sm text-gray-600">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end space-x-4 px-6 py-4 bg-gray-100">
        {{ $footer }}
    </div>
</x-ui.modal>
