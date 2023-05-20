<div class="bg-white lg:min-w-0 lg:flex-1">
    <div class="pl-4 pr-6 pt-4 pb-4 border-b border-t border-gray-200 sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-6 xl:border-t-0">
        <div class="flex items-center">
            <h1 class="flex-1 text-lg font-medium">Submitted Proposals</h1>
        </div>
    </div>
    <ul role="list" class="relative z-0 divide-y divide-gray-200 border-b border-gray-200">
        <li class="relative pl-4 pr-6 py-5 hover:bg-gray-50 sm:py-6 sm:pl-6 lg:pl-8 xl:pl-6">
            @if($principal_investigator)
            <div class="flex items-center justify-between space-x-4">
                <!-- Repo name and link -->
                <div class="min-w-0 space-y-3">
                    <div class="flex items-center space-x-3">
                  <span class="h-4 w-4 bg-green-100 rounded-full flex items-center justify-center" aria-hidden="true">
                    <span class="h-2 w-2 bg-green-400 rounded-full"></span>
                  </span>
                        <span class="block">
                      <a href="#">
                           <h2 class="text-sm font-medium">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        {{ $principal_investigator->research_title }}
                    </h2>
                      </a>
                  </span>
                        </div>
                        <x-ui.badge>{{ $principal_investigator->status }}</x-ui.badge>
                    </div>
                    <!-- Repo meta info -->
                    <div class="flex flex-col flex-shrink-0 items-end space-y-3">
                        <p class="flex items-center space-x-4">
                            <a href="{{ route('principal-investigators.show', $principal_investigator->id) }}" class="relative text-sm text-gray-500 hover:text-gray-900 font-medium"> Show Proposal </a>
                            <a href="{{ route('principal-investigators.show', $principal_investigator->id) }}"
                               class="relative bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-green-300 hover:text-green-400 h-5 w-5">
                                    <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </p>
                        <p class="flex text-gray-500 text-sm space-x-2">
                            <span>Submitted</span>
                            <span aria-hidden="true">&middot;</span>
                            <span>{{ $principal_investigator->created_at }}</span>
                        </p>
                    </div>
                </div>
            @else
                <p class="text-gray-500 text-center">There are no submitted proposals.</p>
            @endif
        </li>
    </ul>
</div>
