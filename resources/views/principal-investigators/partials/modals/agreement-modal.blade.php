<x-ui.dialog-modal wire:model="confirmingAgreement">
    <x-slot name="title">
        <p class="font-bold">{{ __('Agreement on Acceptance of Research Grant For Funding.') }}</p>
    </x-slot>

    <x-slot name="content">
        <h3 class="font-bold">Terms and Conditions of this agreement</h3>

        <ol class="list-decimal list-inside space-y-4 my-4">
            <li>
                I confirm the acceptance of the Research Grant to the value of LKR 400,000 to be used for the purposes indicated in the research proposal to FGSR of SLIIT.
            </li>

            <li>
                I confirm that the component of the research project funded by this grant will commence on 1st July 2022 and conclude on 30th June 2023.
            </li>

            <li>
                I agree to abide by the rules and regulations stipulated in <b><i>“SLIIT Research Funding 2018”</i></b> document and any other relevant guidelines that are available at SLIIT.
            </li>

            <li>
                I shall submit a brief summary of progress periodically at the end of every quarter to the FGSR until such time, the “Final Report” is submitted.
            </li>
        </ol>

        <p>
            I do hereby declare that I have read and understood the terms and conditions specified in this agreement.
        </p>
    </x-slot>
        <x-slot name="footer">
            @if($is_agreed === FALSE)
                <x-ui.button class="ml-3" wire:click.prevent="agree" wire:loading.attr="disabled">
                    {{ __('I Agree') }}
                </x-ui.button>
            @else
                <x-ui.secondary-button wire:click="$toggle('confirmingAgreement')" wire:loading.attr="disabled">
                    {{ __('Close') }}
                </x-ui.secondary-button>
            @endif
        </x-slot>
</x-ui.dialog-modal>
