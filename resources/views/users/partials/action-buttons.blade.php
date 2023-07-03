<div class="flex space-x-2 my-1 lg:my-0">
{{--    <a href="{{ route('roles.index') }}">--}}
{{--        <x-ui.button type="button" class="inline-flex bg-secondary-800 hover:bg-secondary-900 active:bg-secondary-950 focus:bg-secondary-800">--}}
{{--            <x-ui.svg-icon class="-ml-1 -mr-1 sm:mr-2">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" ></path>--}}
{{--            </x-ui.svg-icon>--}}
{{--            <span class="hidden sm:block">Roles</span>--}}
{{--        </x-ui.button>--}}
{{--    </a>--}}
    <a href="{{ route('users.create') }}">
        <x-ui.button type="button" class="inline-flex">
            <x-ui.svg-icon class="-ml-1 -mr-1 sm:mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" ></path>
            </x-ui.svg-icon>
            <span class="hidden sm:block">Create User</span>
        </x-ui.button>
    </a>
</div>
