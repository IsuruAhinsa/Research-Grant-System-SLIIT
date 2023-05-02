<div>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('users.index') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
        </div>

        @include('users.partials.action-buttons')
    </x-slot>

    <div class="my-5">
        @livewire('users.user-table')
    </div>
</div>
