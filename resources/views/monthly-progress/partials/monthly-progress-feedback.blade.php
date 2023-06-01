@if($monthlyProgress->checkExistsGrading())

    <div class="mt-8 flex flex-col">
        <h2 class="text-2xl mb-2">Monthly Progress Grading Summery</h2>
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border-4 border-dashed border-yellow-500 md:rounded-lg">

                    <table class="min-w-full">
                        <tbody class="bg-white">

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4">
                                Grade
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 w-3/4">{{ $monthlyProgress->getGrading()->grade }}</td>
                        </tr>

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4 align-top">
                                Comments
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500 w-3/4">
                                {{ $monthlyProgress->getGrading()->comments }}
                            </td>
                        </tr>

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4 align-top">
                                Graded by
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500 w-3/4">
                                {{ $monthlyProgress->getGrading()->graded_by }}
                            </td>
                        </tr>

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4 align-top">
                                Graded at
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500 w-3/4">
                                {{ $monthlyProgress->getGrading()->created_at->toDayDateTimeString() }}
                            </td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endif

@role('Principal Investigator')
<div class="mt-8 flex flex-col">
    <h2 class="text-2xl mb-2">Monthly Progress Grading Summery</h2>
    @forelse($monthlyProgress->monthlyProgressGrades as $grade)
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border-4 border-dashed border-yellow-500 md:rounded-lg">

                    <table class="min-w-full">
                        <tbody class="bg-white">

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4">
                                Grade
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 w-3/4">{{ $grade->grade }}</td>
                        </tr>

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4 align-top">
                                Comments
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500 w-3/4">
                                {{ $grade->comments }}
                            </td>
                        </tr>

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4 align-top">
                                Graded by
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500 w-3/4">
                                {{ $grade->graded_by }}
                            </td>
                        </tr>

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4 align-top">
                                Graded at
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500 w-3/4">
                                {{ $grade->created_at->toDayDateTimeString() }}
                            </td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    @empty
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border-4 border-dashed border-yellow-500 md:rounded-lg">

                    <table class="min-w-full">
                        <tbody class="bg-white">

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4">
                                Grade
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 w-3/4">Submitted for grading.</td>
                        </tr>

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4 align-top">
                                Comments
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500 w-3/4">
                                -
                            </td>
                        </tr>

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4 align-top">
                                Graded by
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500 w-3/4">
                                -
                            </td>
                        </tr>

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4 align-top">
                                Graded at
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500 w-3/4">
                                -
                            </td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    @endforelse
</div>
@endrole
