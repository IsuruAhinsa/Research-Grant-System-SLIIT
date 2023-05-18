<x-app-layout>
    <x-slot name="header">
        <div>
<<<<<<< HEAD
            {{ Breadcrumbs::render('principal-investigators.dashboard') }}
=======
            {{ Breadcrumbs::render('principal-investigators.index') }}
>>>>>>> origin/master
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Research Proposal Overview
            </h2>
        </div>
    </x-slot>

    <div class="min-h-full flex flex-col mt-2 -mx-8">
        <div class="flex-grow w-full max-w-full mx-auto lg:flex">
            <div class="flex-1 min-w-0 bg-white xl:flex">
                @include('principal-investigators.partials.account-profile')

                @include('principal-investigators.partials.proposal-list')
            </div>
            <!-- Activity feed -->
            <div class="bg-gray-50 px-8 sm:pr-6 lg:border-l lg:border-gray-200">
                <div class="lg:w-80">
                    <div class="pt-6 pb-2">
                        <h2 class="text-sm font-semibold">Activity</h2>
                    </div>
                    <div>
                        <ul role="list" class="divide-y divide-gray-200">
                            <li class="py-4">
                                <div class="flex space-x-3">
                                    <img class="h-6 w-6 rounded-full"
                                         src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=256&h=256&q=80"
                                         alt="">
                                    <div class="flex-1 space-y-1">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-sm font-medium">You</h3>
                                            <p class="text-sm text-gray-500">1h</p>
                                        </div>
                                        <p class="text-sm text-gray-500">Deployed Workcation (2d89f0c8 in master) to
                                            production</p>
                                    </div>
                                </div>
                            </li>

                            <!-- More items... -->
                        </ul>
                        <div class="py-4 text-sm border-t border-gray-200">
                            <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-900">View all activity
                                <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
