<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('designations.create') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Designation') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-white rounded-xl py-10 px-12 my-5 shadow lg:max-w-3xl lg:mx-auto">

        <form class="row" method="POST" action="{{ route('designations.store') }}">
            @csrf
            <div class="relative w-full sm:max-w-half sm:flex-half space-y-4">

                <div>
                    <x-ui.label for="designation" :value="__('Designation Name')"/>
                    <x-ui.input id="designation" name="designation" type="text" class="mt-1 block w-full"
                                value="{{ old('designation') }}" autofocus/>
                    <x-ui.input-error class="mt-2" for="designation"/>
                </div>

            </div>
            <div class="flex flex-row justify-end space-x-4 py-4">
                <x-ui.button type="submit">
                    {{ __('Create Designation') }}
                </x-ui.button>
            </div>
        </form>
    </div>

</x-app-layout>
