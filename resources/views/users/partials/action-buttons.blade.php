<div class="flex space-x-2 my-1 lg:my-0">
    <a href="#">
        <x-ui.button type="button" class="inline-flex bg-secondary-800 hover:bg-secondary-900 active:bg-secondary-950 focus:bg-secondary-800">
            <x-ui.svg-icon class="-ml-1 -mr-1 sm:mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" ></path>
            </x-ui.svg-icon>
            <span class="hidden sm:block">Roles & Permissions</span>
        </x-ui.button>
    </a>
    <a href="{{ route('users.create') }}">
        <x-ui.button type="button" class="inline-flex">
            <x-ui.svg-icon class="-ml-1 -mr-1 sm:mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" ></path>
            </x-ui.svg-icon>
            <span class="hidden sm:block">Create User</span>
        </x-ui.button>
    </a>
    <a href="#">
        <x-ui.button type="button" class="inline-flex">
            <x-ui.svg-icon class="-ml-1 -mr-1 sm:mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" ></path>
            </x-ui.svg-icon>
            <span class="hidden sm:block">Deleted Users</span>
        </x-ui.button>
    </a>
</div>
