<header class="relative" x-data="{ open: false, focus: true }" x-init="init()" @keydown.escape="onEscape"
        @close-popover-group.window="onClosePopoverGroup">
    <div class="bg-gray-900 pt-6">
        <nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6" aria-label="Global">
            <div class="flex items-center flex-1">
                <div class="flex items-center justify-between w-full md:w-auto">
                    <a href="{{ url('/') }}">
                        <span class="sr-only">SLIIT</span>
                        <x-ui.application-logo class="h-10 w-auto sm:h-12"/>
                    </a>
                    <div class="-mr-2 flex items-center md:hidden">
                        <button type="button"
                                class="bg-gray-900 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-800 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white"
                                @click="open = true" @mousedown="if (open) $event.preventDefault()">
                            <span class="sr-only">Open main menu</span>
                            <svg class="h-6 w-6"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="hidden space-x-8 md:flex md:ml-10">

                    <a href="{{ url('/') }}" class="text-base font-medium text-white hover:text-gray-300">Home</a>

                    <a href="{{ route('about') }}" class="text-base font-medium text-white hover:text-gray-300">About</a>

                    <a href="{{ route('contact') }}" class="text-base font-medium text-white hover:text-gray-300">Contact Us</a>

                </div>
            </div>
            <div class="hidden md:flex md:items-center md:space-x-6">
                @if(!request()->routeIs('login'))
                    <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-secondary-800 hover:bg-secondary-900">
                        Sign in
                    </a>
                @endif
            </div>
        </nav>
    </div>


    <div x-show="open" x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in"
         x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
         x-description="Mobile menu, show/hide based on menu open state."
         class="absolute top-0 inset-x-0 p-2 transition transform origin-top md:hidden" x-ref="panel"
         @click.away="open = false">
        <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
            <div class="px-5 pt-4 flex items-center justify-between">
                <div>
                    <x-ui.application-logo class="h-8 w-auto"/>
                </div>
                <div class="-mr-2">
                    <button type="button"
                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-600"
                            @click="open = false">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="pt-5 pb-6">
                <div class="px-2 space-y-1">

                    <a href="{{ url('/') }}"
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">Home</a>

                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">About</a>

                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">Contact
                        Us</a>
                </div>
                <div class="mt-6 px-5">
                    <p class="text-center text-base font-medium text-gray-500">Existing Sliit User? <a
                            href="{{ route('login') }}"
                            class="text-gray-900 hover:underline">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</header>
