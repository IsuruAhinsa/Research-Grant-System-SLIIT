<div class="flex space-x-2 my-1 lg:my-0">
    <a href="{{ route('faculties.create') }}">
        <x-ui.button type="button" class="inline-flex">
            <x-ui.svg-icon class="-ml-1 -mr-1 sm:mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" ></path>
            </x-ui.svg-icon>
            <span class="hidden sm:block">Create Faculty</span>
        </x-ui.button>
    </a>
    <a href="#">
        <x-ui.button type="button" class="inline-flex">
            <x-ui.svg-icon class="-ml-1 -mr-1 sm:mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" ></path>
            </x-ui.svg-icon>
            <span class="hidden sm:block">Deleted Faculties</span>
        </x-ui.button>
    </a>
</div>
