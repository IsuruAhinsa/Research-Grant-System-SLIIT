<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('reviewers.index') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reviewers') }}
            </h2>
        </div>
        @include('reviewers.partials.action-buttons')
    </x-slot>

    <div class="my-5">
        @livewire('reviewers.reviewer-table')
    </div>
</x-app-layout>
