<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Disbursement Plan Payments') }}
        </h2>
    </x-slot>

    @includeWhen($this->allPaymentsSettled(), 'disbursement-plans.partials.payment-settled-success-message')

    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full">
                        <tbody class="bg-white">
                        @forelse($disbursement_plans as $disbursement_plan)
                            <tr class="border-t border-gray-200">
                                <th scope="colgroup"
                                    class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">
                                    {{ $disbursement_plan->month }} <br>
                                    {{ $disbursement_plan->created_at }}
                                </th>
                                <th scope="colgroup"
                                    class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">
                                    {{ $disbursement_plan->category }}
                                </th>
                                <th scope="colgroup"
                                    class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">
                                    {{ $disbursement_plan->activity }}
                                </th>
                                <th colspan="2" scope="colgroup"
                                    class="bg-gray-50 px-4 py-2 text-sm font-semibold text-blue-500 sm:px-6 text-right">
                                    LKR {{ number_format($disbursement_plan->amount, 2) }}
                                </th>
                            </tr>

                            @forelse($disbursement_plan->payments as $payment)

                                <tr class="border-t border-gray-300">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-6 h-6 text-green-500 mr-2">
                                            <path fill-rule="evenodd"
                                                  d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm.53 5.47a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72v5.69a.75.75 0 001.5 0v-5.69l1.72 1.72a.75.75 0 101.06-1.06l-3-3z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        {{ $payment->created_at }}
                                        <span
                                            class="ml-2 inline-flex items-center px-2.5 py-0.5 text-xs font-medium bg-green-100 text-green-800 rounded"> Paid </span>
                                    </td>
                                    <td colspan="3" class="whitespace-nowrap px-3 py-4 text-xs text-gray-700">
                                        {{ $payment->comment ?? '-' }}
                                    </td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 text-green-500">
                                        - LKR {{ number_format($payment->amount, 2) }}
                                    </td>
                                </tr>

                                @if($loop->last)
                                    @if($disbursement_plan->amount === $disbursement_plan->payments->sum('amount'))
                                        <tr class="border-t border-gray-300">
                                            <td colspan="4"
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium sm:pl-6 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                     fill="currentColor" class="w-6 h-6 mr-2 text-green-500">
                                                    <path fill-rule="evenodd"
                                                          d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                Payment Settled
                                            </td>
                                            <td colspan="4" class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 text-green-500">
                                                LKR {{ number_format($disbursement_plan->amount - $payment->calculateTotalPaidAmount($disbursement_plan->id), 2) }}
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="border-t border-gray-300">
                                            <td colspan="4"
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-red-500 sm:pl-6 text-right">
                                                Remaining Payable Amount
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 text-red-500">
                                                LKR {{ number_format($disbursement_plan->amount - $payment->calculateTotalPaidAmount($disbursement_plan->id), 2) }}
                                            </td>
                                        </tr>
                                    @endif
                                @endif

                            @empty

                                <tr class="border-t border-gray-300">
                                    <td colspan="5"
                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-center">
                                        No payment records found!
                                    </td>
                                </tr>

                            @endforelse

                            @unless($disbursement_plan->amount === $disbursement_plan->payments->sum('amount'))
                                @unlessrole('Dean|Principal Investigator')
                                <tr>
                                    <td colspan="5"
                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-center">
                                        <a href="#" wire:click.prevent="makePayment({{$disbursement_plan->id}})">
                                            <x-ui.secondary-button>Make a Payment</x-ui.secondary-button>
                                        </a>
                                    </td>
                                </tr>
                                @endunlessrole
                            @endunless

                        @empty

                            <tr>
                                <td colspan="5"
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-center">
                                    No Disbursement Plan
                                </td>
                            </tr>

                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @includeWhen($makingPayment, 'disbursement-plans.payment-modal')
</div>
