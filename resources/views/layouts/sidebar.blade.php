<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">

    <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-primary-900">
        <div class="flex items-center justify-center flex-shrink-0 px-4">
            <a href="{{ route('dashboard') }}">
                <x-ui.application-logo-v2-light class="block w-auto fill-current h-10"/>
            </a>
        </div>
        <div class="mt-5 flex-1 flex flex-col">
            <nav class="flex-1 px-2 pb-4 space-y-1">

               @include('layouts.partials.sidebar-items')

            </nav>
        </div>
    </div>
</div>
