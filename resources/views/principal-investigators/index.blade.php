<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('principal-investigators.index') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(request()->status == 'Pending')
                    {{ __('New Applications') }}
                @elseif(request()->status == 'Approved')
                    {{ __('Approved Applications') }}
                @else
                    {{ __('Rejected Applications') }}
                @endif
            </h2>
        </div>
    </x-slot>

    <div class="my-5">
        @if(request()->status == 'Pending')
            @livewire('principal-investigators.principal-investigator-pending-table')
        @elseif(request()->status == 'Approved')
            @livewire('principal-investigators.principal-investigator-approved-table')
        @else
            @livewire('principal-investigators.principal-investigator-rejected-table')
        @endif
    </div>
</x-app-layout>
