@php
    if ($principal_investigator) {
        if ($principal_investigator->isPending()) {
            $color1 = 'bg-warning-100';
            $color2 = 'bg-warning-400';
            $statusName = 'PENDING';
        } elseif ($principal_investigator->isApproved()) {
            $color1 = 'bg-success-100';
            $color2 = 'bg-success-400';
            $statusName = 'APPROVED';
        } elseif ($principal_investigator->isRejected()) {
            $color1 = 'bg-danger-100';
            $color2 = 'bg-danger-400';
            $statusName = 'REJECTED';
        }
    }
@endphp

<div class="flex items-center justify-between space-x-4">

    <div class="min-w-0 space-y-3">
        <div class="flex items-center space-x-3">
                  <span
                      class="h-4 w-4 rounded-full flex items-center justify-center {{ $color1 }}"
                      aria-hidden="true">
                    <span class="h-2 w-2 rounded-full {{ $color2 }}"></span>
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
        <x-ui.badge>
            {{ $statusName }}
        </x-ui.badge>
    </div>

    <div class="flex flex-col flex-shrink-0 items-end space-y-3">
        <p class="flex items-center space-x-4">
            <a href="{{ route('principal-investigators.show', $principal_investigator->id) }}"
               class="relative text-sm text-gray-500 hover:text-gray-900 font-medium"> Show
                Proposal </a>
            <a href="{{ route('principal-investigators.show', $principal_investigator->id) }}"
               class="relative bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                     class="text-green-300 hover:text-green-400 h-5 w-5">
                    <path fill-rule="evenodd"
                          d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                          clip-rule="evenodd"/>
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

@if($principal_investigator->isApproved() || $principal_investigator->isRejected())
    @if($principal_investigator->reviewerFeedbacks()->exists())
        @include('principal-investigators.partials.feedbacks', ['proposal' => $principal_investigator])
    @endif
@endif
