<x-ui.sidebar-item title="Dashboard" route="{{ route('dashboard') }}">
    <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
    </x-ui.svg-icon>
</x-ui.sidebar-item>

@hasanyrole('Super Administrator|Administrator')
<div x-data="{ open: false }">
    <x-ui.sidebar-item @click="open = !open" route="#">
        <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z"></path>
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

        <a href="{{ route('designations.index') }}"
           class="group w-full flex items-center pl-2 pr-2 py-2 text-sm font-medium text-white rounded-md hover:bg-primary-600">
            Designations
        </a>

    </div>
</div>
@endhasanyrole

@role('Principal Investigator')
<x-ui.sidebar-item title="Research Center" route="{{ route('principal-investigators.dashboard') }}">
    <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" ></path>
    </x-ui.svg-icon>
</x-ui.sidebar-item>

<x-ui.sidebar-item title="Downloads" route="{{ route('downloads.index') }}">
    <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"></path>
    </x-ui.svg-icon>
</x-ui.sidebar-item>

@if(Auth::user()->principal_investigators()->wherePivotNull('is_accepted')->exists())
    <x-ui.sidebar-item title="Review Center" route="{{ route('reviews.index', ['status' => 'requested']) }}">
        <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
        </x-ui.svg-icon>
    </x-ui.sidebar-item>
@endif

@endrole

@hasanyrole('Super Administrator|Administrator|Dean')

<div x-data="{ open: false }">
    <x-ui.sidebar-item @click="open = !open" route="#">
        <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" ></path>
        </x-ui.svg-icon>
        <span class="flex-1">Applications</span>
        <svg
            class="text-gray-300 ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
            viewBox="0 0 20 20" aria-hidden="true"
            :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }">
            <path d="M6 6L14 10L6 14V6Z" fill="currentColor"></path>
        </svg>
    </x-ui.sidebar-item>
    <div class="space-y-1 border-2 border-blue-600 rounded-lg m-3 p-2" id="sub-menu-2"
         x-show="open">

        @unlessrole('Dean')

            <a href="{{ route('principal-investigators.index', ['status' => 'Pending']) }}"
               class="group w-full flex items-center pl-2 pr-2 py-2 text-sm font-medium text-white rounded-md hover:bg-primary-600">
                New Applications
            </a>

        @endunlessrole

        <a href="{{ route('principal-investigators.index', ['status' => 'Approved']) }}"
           class="group w-full flex items-center pl-2 pr-2 py-2 text-sm font-medium text-white rounded-md hover:bg-primary-600">
            Approved Applications
        </a>

        <a href="{{ route('principal-investigators.index', ['status' => 'Rejected']) }}"
           class="group w-full flex items-center pl-2 pr-2 py-2 text-sm font-medium text-white rounded-md hover:bg-primary-600">
            Rejected Applications
        </a>

    </div>
</div>

<x-ui.sidebar-item title="User Management" route="{{ route('users.index') }}">
    <x-ui.svg-icon class="mr-3 flex-shrink-0 text-white">
        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
    </x-ui.svg-icon>
</x-ui.sidebar-item>
@endhasanyrole
