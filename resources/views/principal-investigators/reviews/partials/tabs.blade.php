<div>
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select a tab</label>
        <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
        <select id="tabs" name="tabs" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            <option>Requests</option>

            <option>Approved</option>

            <option selected>Rejected</option>
        </select>
    </div>
    <div class="hidden sm:block">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <x-ui.tab-link
                    href="{{ route('reviews.index') }}"
                    :active="request()->routeIs('reviews.index')" :count="Auth::user()->principal_investigators()->count()">
                    Requests
                </x-ui.tab-link>

                <x-ui.tab-link href="#" :active="request()->routeIs()" :count="2">
                    Approved
                </x-ui.tab-link>

                <x-ui.tab-link href="#" :active="request()->routeIs()" :count="3">
                    Rejected
                </x-ui.tab-link>
            </nav>
        </div>
    </div>
</div>
