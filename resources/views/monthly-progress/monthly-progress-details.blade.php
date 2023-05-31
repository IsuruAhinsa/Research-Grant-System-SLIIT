<div>
    <x-slot name="header">
        <div>
            @role('Principal Investigator')
                {{ Breadcrumbs::render('monthly-progress.show', $monthlyProgress) }}
            @endrole
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $monthlyProgress->current_progress_month }} Progress Reports
            </h2>
        </div>
    </x-slot>

    <div class="bg-gray-900 mt-4">
        <div class="pt-6 sm:pt-8 lg:pt-12">
            <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto space-y-2 lg:max-w-none">
                    <h2 class="text-lg leading-6 font-semibold text-gray-300 uppercase tracking-wider">
                        {{ $monthlyProgress->current_progress_month }}
                    </h2>
                    <p class="text-3xl font-extrabold text-white sm:text-4xl lg:text-5xl">Monthly Progress</p>
                    <p class="text-gray-300 text-left">
                        Monthly progress research refers to the evaluation and documentation of advancements made within a specific area of study over a one-month period. It involves conducting experiments, gathering data, analyzing findings, and summarizing the key developments achieved during that timeframe. The purpose of monthly progress research is to monitor and track the incremental growth, identify trends, and assess the effectiveness of strategies employed in the research project. It provides researchers with a snapshot of their progress, enables them to make informed decisions, and serves as a foundation for future work and collaborations. The simple description of monthly progress research highlights the continuous nature of scientific inquiry and the need for regular assessment to ensure steady advancement towards the research objectives.
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-8 pb-12 bg-gray-50 sm:mt-12 sm:pb-16 lg:mt-16 lg:pb-24">
            <div class="relative">
                <div class="absolute inset-0 h-3/4 bg-gray-900"></div>
                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-md mx-auto space-y-4 lg:max-w-5xl lg:grid lg:grid-cols-2 lg:gap-5 lg:space-y-0">
                        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                            <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6 h-full">
                                <div>
                                    <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-indigo-100 text-indigo-600" id="tier-standard">{{ $monthlyProgress->current_progress_year }}</h3>
                                </div>
                                <div class="mt-4 flex items-baseline text-6xl font-extrabold">
                                    {{ $monthlyProgress->current_progress_month }}
                                </div>
                                <p class="mt-5 text-lg text-gray-500">
                                    {{ $monthlyProgress->current_progress }}
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                            <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6 h-full">
                                <div>
                                    <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-indigo-100 text-indigo-600" id="tier-standard">{{ $monthlyProgress->next_progress_year }}</h3>
                                </div>
                                <div class="mt-4 flex items-baseline text-6xl font-extrabold">
                                    {{ $monthlyProgress->next_progress_month }}
                                </div>
                                <p class="mt-5 text-lg text-gray-500">
                                    {{ $monthlyProgress->next_progress }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @isset($monthlyProgress->issues)
                <div class="mt-4 relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:mt-5">
                    <div class="max-w-md mx-auto lg:max-w-5xl">
                        <div class="rounded-lg bg-gray-100 px-6 py-8 sm:p-10 lg:flex lg:items-center">
                            <div class="flex-1">
                                <div>
                                    <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-white text-gray-800">Issues</h3>
                                </div>
                                <div class="mt-4 text-lg text-gray-600">
                                    {{ $monthlyProgress->issues }}
                                </div>
                            </div>
                            <div class="mt-6 rounded-md shadow lg:mt-0 lg:ml-10 lg:flex-shrink-0">
                                <div class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50"> {{ $monthlyProgress->created_at->toDateString() }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    </div>
</div>
