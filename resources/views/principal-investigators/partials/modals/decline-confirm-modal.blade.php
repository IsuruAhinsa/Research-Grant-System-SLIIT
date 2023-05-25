<x-ui.dialog-modal wire:model="confirmingDecline">
    <x-slot name="title">
        {{ __('Do you want to reject this application?') }}
    </x-slot>

    <form wire:submit.prevent="decline">
        <x-slot name="content">
            {{ __('Do you really want to reject this application? Once Rejected, It will not be allowed to approve again.') }}

            <div class="mt-4">
                <x-ui.textarea wire:model.defer="remarks" class="mt-1 block w-full" placeholder="Type reason to reject this application..."/>

                <x-ui.input-error for="remarks" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-ui.secondary-button wire:click="$toggle('confirmingDecline')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-ui.secondary-button>

            <x-ui.danger-button type="submit" class="ml-3" wire:click.prevent="decline" wire:loading.attr="disabled">
                {{ __('Reject') }}
            </x-ui.danger-button>
        </x-slot>
    </form>
</x-ui.dialog-modal>
