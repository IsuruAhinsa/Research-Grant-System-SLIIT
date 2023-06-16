@if($principal_investigator->getPreviousProposals($principal_investigator->id)->count())
    <div
        class="pl-4 pr-6 pt-4 pb-4 border-b border-t border-gray-200 sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-6 xl:border-t-0">
        <div class="flex items-center">
            <h1 class="flex-1 text-lg font-medium">Proposal History</h1>
        </div>
    </div>

    <ul role="list" class="relative z-0 divide-y divide-gray-200 border-b border-gray-200">
        @foreach($principal_investigator->getPreviousProposals($principal_investigator->id) as $proposal)
            <li class="relative pl-4 pr-6 py-5 sm:py-6 sm:pl-6 lg:pl-8 xl:pl-6">

                @include('principal-investigators.proposal-item', ['principal_investigator' => $proposal])

            </li>
        @endforeach
    </ul>
@endif
