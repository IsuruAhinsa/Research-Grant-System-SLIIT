<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('faculties.index') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Faculties') }}
            </h2>
        </div>
        @include('faculties.partials.action-buttons')
    </x-slot>

    <div class="my-5">
        @livewire('faculties.faculty-table')
    </div>
</x-app-layout>
