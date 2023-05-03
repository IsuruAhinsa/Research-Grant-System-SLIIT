<div x-show="opensidebar" class="fixed inset-0 flex z-40 md:hidden"
     x-ref="dialog"
     aria-modal="true">

    <div x-show="opensidebar" x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-600 bg-opacity-75"
         @click="opensidebar = false"
         aria-hidden="true">
    </div>

    <div x-show="opensidebar" x-transition:enter="transition ease-in-out duration-300 transform"
         x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-primary-900">

        <div x-show="opensidebar" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
             x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="absolute top-0 right-0 -mr-12 pt-2">
            <button type="button"
                    class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    @click="opensidebar = false">
                <span class="sr-only">Close sidebar</span>
                <svg class="h-6 w-6 text-white"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="flex-shrink-0 flex items-center px-4">
            <x-ui.application-logo-v2-light class="h-8 w-auto"/>
        </div>
        <div class="mt-5 flex-1 h-0 overflow-y-auto">
            <nav class="px-2 space-y-1">

                <x-ui.sidebar-item title="Dashboard" route="{{ route('dashboard') }}">
                    <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </x-ui.svg-icon>
                </x-ui.sidebar-item>

                <div x-data="{ open: false }">
                    <x-ui.sidebar-item @click="open = !open" route="#">
                        <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
                            <path stroke-width="2"  stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" ></path>
                        </x-ui.svg-icon>
                        <span class="flex-1">Master Data</span>
                        <svg
                            class="text-gray-300 ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                            viewBox="0 0 20 20" aria-hidden="true"
                            :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }">
                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor"></path>
                        </svg>
                    </x-ui.sidebar-item>
                    <div class="space-y-1 border-2 border-blue-600 rounded-lg m-3 p-2" id="sub-menu-2"
                         x-show="open">

                        <a href="{{ route('faculties.index') }}"
                           class="group w-full flex items-center pl-2 pr-2 py-2 text-sm font-medium text-white rounded-md hover:bg-primary-600">
                            Faculties
                        </a>

                        <a href="#"
                           class="group w-full flex items-center pl-2 pr-2 py-2 text-sm font-medium text-white rounded-md hover:bg-primary-600">
                            Designations
                        </a>

                        <a href="#"
                           class="group w-full flex items-center pl-2 pr-2 py-2 text-sm font-medium text-white rounded-md hover:bg-primary-600">
                            Reviewers
                        </a>

                    </div>
                </div>

                <x-ui.sidebar-item title="Projects" route="#">
                    <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </x-ui.svg-icon>
                </x-ui.sidebar-item>

                <x-ui.sidebar-item title="Calendar" route="#">
                    <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </x-ui.svg-icon>
                </x-ui.sidebar-item>

                <x-ui.sidebar-item title="Documents" route="#">
                    <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </x-ui.svg-icon>
                </x-ui.sidebar-item>

                <x-ui.sidebar-item title="Downloads" route="#">
                    <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"></path>
                    </x-ui.svg-icon>
                </x-ui.sidebar-item>

                <x-ui.sidebar-item title="User Management" route="{{ route('users.index') }}">
                    <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                    </x-ui.svg-icon>
                </x-ui.sidebar-item>
            </nav>
        </div>
    </div>

    <div class="flex-shrink-0 w-14" aria-hidden="true">
        <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
</div>
