<x-ui.dialog-modal wire:model="makingPayment">
    <x-slot name="title">
        <p class="font-bold">{{ __('Make A Payment.') }}</p>
    </x-slot>

    <x-slot name="content">
        <p>Payable amount</p>
        <h3 class="font-bold text-3xl text-red-500">LKR {{ number_format($disbursementPlan->amount - $disbursementPlan->payments->sum('amount'), 2) }}</h3>

        <div class="space-y-2">
            <x-ui.input wire:model.defer="amount" class="mt-1 block w-full" placeholder="Enter payment"/>
            <x-ui.input-error for="amount"/>

            <x-ui.textarea wire:model.defer="comment" class="mt-1 block w-full" placeholder="Comments" />
            <x-ui.input-error for="comment"/>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-ui.button class="ml-3" wire:click.prevent="pay" wire:loading.attr="disabled">
            {{ __('Pay') }}
        </x-ui.button>
    </x-slot>
</x-ui.dialog-modal>
