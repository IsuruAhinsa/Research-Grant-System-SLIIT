<div class="bg-white lg:min-w-0 lg:flex-1">
    <div class="pl-4 pr-6 pt-4 pb-4 border-b border-t border-gray-200 sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-6 xl:border-t-0">
        <div class="flex items-center">
            <h1 class="flex-1 text-lg font-medium">Submitted Proposal</h1>
        </div>
    </div>
    <ul role="list" class="relative z-0 divide-y divide-gray-200 border-b border-gray-200">

        @includeWhen($principal_investigator, 'principal-investigators.partials.notice-area')

        <li class="relative pl-4 pr-6 py-5 sm:py-6 sm:pl-6 lg:pl-8 xl:pl-6">
            @if($principal_investigator)
                @include('principal-investigators.proposal-item')
            @else
                <p class="text-gray-500 text-center">There are no submitted proposals.</p>
            @endif
        </li>
    </ul>

    @includeWhen($principal_investigator, 'principal-investigators.partials.previous-proposals')
</div>
