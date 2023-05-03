<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('roles.index') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles') }}
            </h2>
        </div>

        @include('roles.partials.action-buttons')
    </x-slot>

    <div class="my-5">
        @livewire('roles.role-table')
    </div>
</x-app-layout>
