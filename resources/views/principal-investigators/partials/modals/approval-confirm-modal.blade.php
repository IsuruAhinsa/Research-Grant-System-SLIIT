<x-ui.dialog-modal wire:model="confirmingApproval">
    <x-slot name="title">
        {{ __('Do you want to approve this application?') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Do you really want to approve this application? Once Approved, It will not be allowed to reject.') }}

        @hasanyrole('Super Administrator|Administrator')
            <div class="mt-4">
                <x-ui.input wire:model.defer="grant_number" class="mt-1 block w-full" placeholder="Enter grant number"/>

                <x-ui.input-error for="grant_number" class="mt-2" />
            </div>
        @endhasanyrole
    </x-slot>

    <x-slot name="footer">
        <x-ui.secondary-button wire:click="$toggle('confirmingApproval')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-ui.secondary-button>

        <x-ui.success-button class="ml-3" wire:click.prevent="approve" wire:loading.attr="disabled">
            {{ __('Approve') }}
        </x-ui.success-button>
    </x-slot>
</x-ui.dialog-modal>
