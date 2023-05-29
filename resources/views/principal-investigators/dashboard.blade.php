<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('principal-investigators.dashboard') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Research Proposal Overview
            </h2>
        </div>
    </x-slot>

    <div class="min-h-full flex flex-col mt-2 -mx-8">
        <div class="flex-grow w-full max-w-full mx-auto lg:flex">
            <div class="flex-1 min-w-0 bg-white xl:flex">
                @include('principal-investigators.partials.account-profile')

                @include('principal-investigators.partials.proposal-list')
            </div>

            @include('principal-investigators.partials.activity-center')
        </div>
    </div>
</x-app-layout>
