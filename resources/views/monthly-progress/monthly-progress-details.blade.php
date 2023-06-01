<div>
    <x-slot name="header">
        <div>
            @role('Principal Investigator')
                {{ Breadcrumbs::render('monthly-progress.show', $monthlyProgress) }}
            @endrole
        </div>
    </x-slot>

    <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 mt-6">
        <div class="px-4 space-y-2 sm:px-0 sm:flex sm:items-baseline sm:justify-between sm:space-y-0">
            <div class="flex sm:items-baseline sm:space-x-4">
                <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                    {{ $monthlyProgress->current_progress_year }} - {{ $monthlyProgress->current_progress_month }}
                </h1>
            </div>
            <p class="text-sm text-gray-600">Monthly Progress Submitted
                <time datetime="2021-03-22" class="font-medium text-gray-900">
                    {{ $monthlyProgress->created_at->toDayDateTimeString() }}
                </time>
            </p>
        </div>

        <div class="mt-6">
            <div class="space-y-8">

                <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:border sm:rounded-lg">
                    <div class="py-6 px-4 sm:px-6 lg:p-8">
                        <div class="sm:flex">
                            <div class="mt-6 sm:mt-0 sm:ml-6">
                                <p class="mt-2 text-sm font-medium text-gray-900">
                                    {{ $monthlyProgress->current_progress }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                    {{ $monthlyProgress->next_progress_year }} - {{ $monthlyProgress->next_progress_month }}
                </h1>

                <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:border sm:rounded-lg">
                    <div class="py-6 px-4 sm:px-6 lg:p-8">
                        <div class="sm:flex">
                            <div class="mt-6 sm:mt-0 sm:ml-6">
                                <p class="mt-2 text-sm font-medium text-gray-900">
                                    {{ $monthlyProgress->next_progress }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @isset($monthlyProgress->issues)
                    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                        Issues
                    </h1>

                    <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:border sm:rounded-lg">
                        <div class="py-6 px-4 sm:px-6 lg:p-8">
                            <div class="sm:flex">
                                <div class="mt-6 sm:mt-0 sm:ml-6">
                                    <p class="mt-2 text-sm font-medium text-gray-900">
                                        {{ $monthlyProgress->issues }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </div>

@hasanyrole('Dean|Super Administrator|Administrator|Principal Investigator')

@include('monthly-progress.partials.monthly-progress-feedback')

@unlessrole('Principal Investigator')
    @include('monthly-progress.partials.monthly-progress-feedback-form')
@endunlessrole

@endhasanyrole
