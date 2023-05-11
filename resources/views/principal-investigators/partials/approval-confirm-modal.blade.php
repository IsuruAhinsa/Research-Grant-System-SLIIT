<x-ui.dialog-modal wire:model="confirmingApproval">
    <x-slot name="title">
        {{ __('Do you want to approve this application?') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Do you really want to approve this application? Once Approved, It will not be allowed to reject.') }}
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
