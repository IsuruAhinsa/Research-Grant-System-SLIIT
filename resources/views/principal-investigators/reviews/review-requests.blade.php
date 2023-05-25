<div>
    @if($principalInvestigator->users()->wherePivot('user_id', Auth::id())->wherePivotNull('is_accepted')->exists())
        <a wire:click.prevent="accept" wire:loading.attr="disabled" href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-green-200"> Accept </a>

        <a wire:click.prevent="decline" wire:loading.attr="disabled" href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-red-200"> Decline </a>
    @else
        <a href="{{ route('principal-investigators.show', $principalInvestigator->id) }}" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-blue-200"> Show </a>
    @endif
</div>
