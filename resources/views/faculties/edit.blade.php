<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('faculties.edit', $faculty) }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Faculty') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-white rounded-xl py-10 px-12 my-5 shadow lg:max-w-3xl lg:mx-auto">

        <form class="row" method="POST" action="{{ route('faculties.update', $faculty->id) }}">
            @csrf
            @method('PUT')
            <div class="relative w-full sm:max-w-half sm:flex-half space-y-4">

                <div>
                    <x-ui.label for="name" :value="__('Faculty Name')"/>
                    <x-ui.input id="name" name="name" type="text" class="mt-1 block w-full"
                                value="{{ old('name', $faculty->name) }}" autofocus/>
                    <x-ui.input-error class="mt-2" for="name"/>
                </div>

                <div>
                    <x-ui.label for="code" :value="__('Faculty Code')"/>
                    <x-ui.input id="code" name="code" type="text" class="mt-1 block w-full"
                                value="{{ old('code', $faculty->code) }}"/>
                    <x-ui.input-error class="mt-2" for="code"/>
                </div>

            </div>
            <div class="flex flex-row justify-end space-x-4 py-4">
                <x-ui.button type="submit">
                    {{ __('Update Faculty') }}
                </x-ui.button>
            </div>
        </form>
    </div>

</x-app-layout>
