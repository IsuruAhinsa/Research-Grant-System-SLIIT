<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('settings.index') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Settings') }}
            </h2>
        </div>
    </x-slot>

    <div
        x-data="{showGeneralTab: true}"
        x-cloak
        class="flex flex-row bg-white dark:bg-dark-secondary h-full my-4 rounded-lg"
    >

        <div class="flex flex-col md:flex-row w-full">

            <div class="w-full md:w-1/4 border-r my-2">

                @include('settings.partials.setting-vertical-menu')

            </div>

            <div class="w-full md:w-3/4 md:mx-2 my-2">

                <div x-show="showGeneralTab">
                    @include('settings.general-settings-form')
                </div>

            </div>

        </div>

    </div>

</x-app-layout>
