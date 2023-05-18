<div class="xl:flex-shrink-0 xl:w-64 xl:border-r xl:border-gray-200 bg-white ml-8">
    <div class="pl-4 pr-6 py-6 sm:pl-6 lg:pl-8 xl:pl-0">
        <div class="flex items-center justify-between">
            <div class="flex-1 space-y-8">
                <div class="space-y-8 sm:space-y-0 sm:flex sm:justify-between sm:items-center xl:block xl:space-y-8">
                    <!-- Profile -->
<<<<<<< HEAD
                    @isset($principal_investigator)
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0 h-12 w-12">
                                <img class="h-12 w-12 rounded-full"
                                     src="https://ui-avatars.com/api/?name={{ $principal_investigator->first_name }}+{{$principal_investigator->last_name}}&background=B799FF&color=fff"
                                     alt="">
                            </div>
                            <div class="space-y-1">
                                <div
                                    class="text-sm font-medium text-gray-900">{{ $principal_investigator->fullname }}</div>
                                <a href="#" class="group flex items-center space-x-2">
                                    <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                                    </svg>
                                    <span
                                        class="text-sm text-gray-500 group-hover:text-gray-900 font-medium">{{ $principal_investigator->faculty->name }}</span>
                                </a>
                            </div>
                        </div>
                    @endisset
=======
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0 h-12 w-12">
                            <img class="h-12 w-12 rounded-full"
                                 src="https://ui-avatars.com/api/?name={{ $principal_investigator->first_name }}+{{$principal_investigator->last_name}}&background=B799FF&color=fff"
                                 alt="">
                        </div>
                        <div class="space-y-1">
                            <div class="text-sm font-medium text-gray-900">{{ $principal_investigator->fullname }}</div>
                            <a href="#" class="group flex items-center space-x-2">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                                </svg>
                                <span
                                    class="text-sm text-gray-500 group-hover:text-gray-900 font-medium">{{ $principal_investigator->faculty->name }}</span>
                            </a>
                        </div>
                    </div>
>>>>>>> origin/master
                    <!-- Action buttons -->
                    <div class="flex flex-col sm:flex-row xl:flex-col">
                        <a href="{{ route('principal-investigators.create') }}">
                            <button type="button"
                                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 xl:w-full">
                                New Research Proposal
                            </button>
                        </a>
<<<<<<< HEAD
                        @isset($principal_investigator)
                            <button type="button"
                                    class="mt-3 inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 xl:ml-0 xl:mt-3 xl:w-full">
                                Corrected Proposal
                            </button>
                        @endisset
                    </div>
                </div>
                <!-- Meta info -->
                @isset($principal_investigator)
                    <div
                        class="flex flex-col space-y-6 sm:flex-row sm:space-y-0 sm:space-x-8 xl:flex-col xl:space-x-0 xl:space-y-6">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="h-5 w-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                            </svg>

                            <span class="text-sm text-gray-500 font-medium">{{ $principal_investigator->email }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="h-5 w-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
                            </svg>
                            <span
                                class="text-sm text-gray-500 font-medium">{{ $principal_investigator->designation->designation }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="h-5 w-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                            </svg>
                            <span class="text-sm text-gray-500 font-medium">{{ $principal_investigator->phone }}</span>
                        </div>
                    </div>
                @endisset
=======
                        <button type="button"
                                class="mt-3 inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 xl:ml-0 xl:mt-3 xl:w-full">
                            Corrected Proposal
                        </button>
                    </div>
                </div>
                <!-- Meta info -->
                <div
                    class="flex flex-col space-y-6 sm:flex-row sm:space-y-0 sm:space-x-8 xl:flex-col xl:space-x-0 xl:space-y-6">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                        </svg>

                        <span class="text-sm text-gray-500 font-medium">{{ $principal_investigator->email }}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                        </svg>
                        <span class="text-sm text-gray-500 font-medium">{{ $principal_investigator->designation->designation }}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        <span class="text-sm text-gray-500 font-medium">{{ $principal_investigator->phone }}</span>
                    </div>
                </div>
>>>>>>> origin/master
            </div>
        </div>
    </div>
</div>
