<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('designations.index') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Designations') }}
            </h2>
        </div>
        @include('designations.partials.action-buttons')
    </x-slot>

    <div class="my-5">
        @livewire('designations.designation-table')
    </div>
</x-app-layout>
