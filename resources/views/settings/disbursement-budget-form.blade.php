<div class="grid grid-cols-1 px-5 md:px-3 md:my-5">

    <div class="flex md:mb-6">
        <h3 class="text-2xl font-medium text-gray-900 dark:text-white">
            {{ __('Disbursement Budget') }}
        </h3>
    </div>

    <div class="mt-5 md:mt-0">
        <form action="{{ route('settings.disbursement.budget') }}" method="post">
            @csrf
            <div class="py-3">
                <div class="grid grid-cols-1 space-y-6">
                    <div class="col-span-6 sm:col-span-4">
                        <x-ui.label for="budget" value="{{ __('Budget') }}" />
                        <x-ui.input name="budget" placeholder="Enter Budget" id="budget" type="text" value="{{ \App\Models\Setting::getSettings()->budget }}" class="mt-1 block w-full"/>
                        <x-ui.input-error for="budget" class="mt-2" />
                    </div>
                </div>
            </div>

            <x-ui.button>
                {{ __('Save') }}
            </x-ui.button>
        </form>
    </div>

</div>
