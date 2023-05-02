<x-ui.confirmation-modal wire:model="confirmingDeletion">

    <x-slot name="title">
        Delete User?
    </x-slot>

    <x-slot name="content">
        Would you like to delete this user? By checking following permanently delete checkbox, this user, all of its related resources and data will be permanently deleted. It cannot be undone.

        <label class="flex flex-row items-center py-3 cursor-pointer">
            <x-ui.checkbox wire:model="forceDelete" class="text-red-600 focus:border-red-300 focus:ring-red-200"/>
            <span class="ml-2 text-gray-700 dark:text-white">Permanently Delete User</span>
        </label>

    </x-slot>

    <x-slot name="footer">
        <x-ui.secondary-button wire:click="$set('confirmingDeletion', false)" wire:loading.attr="disabled">
            Nevermind
        </x-ui.secondary-button>

        <x-ui.danger-button wire:click="delete({{ $confirmingDeletion }})" class="ml-2" wire:loading.attr="disabled">
            Delete User
        </x-ui.danger-button>
    </x-slot>

</x-ui.confirmation-modal>
