<div>
    @if($principalInvestigator->hasPendingReviewerRequest())
        <a wire:click.prevent="accept" wire:loading.attr="disabled" href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-green-200"> Request Accept </a>

        <a wire:click.prevent="decline" wire:loading.attr="disabled" href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-red-200"> Request Decline </a>
    @else
        <a href="{{ route('principal-investigators.show', $principalInvestigator->id) }}" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-blue-200"> Show </a>
    @endif
</div>
