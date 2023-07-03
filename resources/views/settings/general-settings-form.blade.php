<div class="grid grid-cols-1 px-5 md:px-3 md:my-5">

    <div class="flex md:mb-6">
        <h3 class="text-2xl font-medium text-gray-900 dark:text-white">
            {{ __('General Settings') }}
        </h3>
    </div>

    <div class="mt-5 md:mt-0">
        <form action="{{ route('settings.general') }}" method="post">
            @csrf
            <div class="py-3">
                <div class="grid grid-cols-1 space-y-6">
                    <div class="col-span-6 sm:col-span-4">
                        <x-ui.label for="budget" value="{{ __('Disbursement Budget (LKR.)') }}" />
                        <x-ui.input name="budget" placeholder="Enter Budget" id="budget" type="text" value="{{ \App\Models\Setting::getSettings()->budget }}" class="mt-1 block w-full"/>
                        <x-ui.input-error for="budget" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-ui.label for="start_date" value="{{ __('Research Period Start Date') }}" />
                        <x-ui.input name="start_date" placeholder="Enter Start Date" id="start_date" type="date" value="{{ \App\Models\Setting::getSettings()->start_date }}" class="mt-1 block w-full"/>
                        <x-ui.input-error for="start_date" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-ui.label for="end_date" value="{{ __('Research Period End Date') }}" />
                        <x-ui.input name="end_date" placeholder="Enter End Date" id="end_date" type="date" value="{{ \App\Models\Setting::getSettings()->end_date }}" class="mt-1 block w-full"/>
                        <x-ui.input-error for="end_date" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-ui.label for="research_funding_year" value="{{ __('Research Funding Year') }}" />
                        <x-ui.input name="research_funding_year" placeholder="Enter Research Funding Year" id="research_funding_year" type="text" value="{{ \App\Models\Setting::getSettings()->research_funding_year }}" class="mt-1 block w-full"/>
                        <x-ui.input-error for="research_funding_year" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-ui.label for="faculty_code" value="{{ __('Research Handling Faculty Code') }}" />
                        <x-ui.input name="faculty_code" placeholder="Enter Faculty Code" id="faculty_code" type="text" value="{{ \App\Models\Setting::getSettings()->faculty_code }}" class="mt-1 block w-full"/>
                        <x-ui.input-error for="faculty_code" class="mt-2" />
                    </div>
                </div>
            </div>

            <x-ui.button>
                {{ __('Save') }}
            </x-ui.button>
        </form>
    </div>

</div>
