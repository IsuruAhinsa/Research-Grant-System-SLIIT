<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold">Review Dashboard</h2>
    </x-slot>

    @include('principal-investigators.reviews.partials.tabs')

    @include('principal-investigators.reviews.approval-list')

</x-app-layout>
