<x-app-layout>

    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('reports.financial') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Generate Financial Reports') }}
            </h2>
        </div>
    </x-slot>

</x-app-layout>
