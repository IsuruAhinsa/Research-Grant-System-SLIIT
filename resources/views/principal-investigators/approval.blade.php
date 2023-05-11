<div>
    <div class="flex space-x-5">
        <x-ui.button type="button" wire:click.prevent="confirmApprove" class="bg-success-600 hover:bg-success-500 active:bg-success-700 focus:bg-success-700">Approve</x-ui.button>
        <x-ui.button class="bg-red-600 hover:bg-red-500 active:bg-red-700 focus:bg-red-700">Decline</x-ui.button>
    </div>

    @include('principal-investigators.partials.approval-confirm-modal')
</div>
