<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto">
            <div class="bg-white overflow-hidden sm:rounded-lg border">
                @unlessrole('Super Administrator|Administrator')
                    <x-ui.welcome />
                @endunlessrole

                @hasanyrole('Super Administrator|Administrator')
                    @include('widgets.next-payments')
                @endhasanyrole
            </div>

            @unlessrole('Principal Investigator')
                @include('widgets.stats')
            @endunlessrole
        </div>
    </div>
</x-app-layout>
