<x-app-layout>
    <x-slot name="header">
        Review Dashboard
    </x-slot>

    @include('principal-investigators.reviews.partials.tabs')

    @include('principal-investigators.reviews.approval-list')

</x-app-layout>
