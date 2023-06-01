@unless($monthlyProgress->checkExistsGrading())
    <div class="mt-8 flex flex-col">
        <h2 class="text-2xl mb-2 text-red-500">Monthly Progress Grading</h2>
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border-4 border-dashed border-red-500 md:rounded-lg">

                    <table class="min-w-full">

                        <form action="{{ route('monthly-progress.grade.store') }}" method="post">
                            @csrf

                            <input type="hidden" name="monthly_progress_id" value="{{ $monthlyProgress->id }}">

                            <tbody class="bg-white">

                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4">Grade</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 w-3/4">
                                    <fieldset class="mt-4">
                                        <legend class="sr-only">Grade Type</legend>
                                        <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                                            <div class="flex items-center">
                                                <input id="Poor" value="Poor" name="grade" type="radio" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                <label for="Poor" class="ml-3 block text-sm font-medium text-gray-700"> Poor </label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="Satisfactory" value="Satisfactory" name="grade" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                <label for="Satisfactory" class="ml-3 block text-sm font-medium text-gray-700"> Satisfactory </label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="Average" value="Average" name="grade" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                <label for="Average" class="ml-3 block text-sm font-medium text-gray-700"> Average </label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="Good" value="Good" name="grade" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                <label for="Good" class="ml-3 block text-sm font-medium text-gray-700"> Good </label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="Excellent" value="Excellent" name="grade" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                <label for="Excellent" class="ml-3 block text-sm font-medium text-gray-700"> Excellent </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>

                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/4 align-top">Comments</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 w-3/4">
                                    <x-ui.textarea class="w-full" name="comments" placeholder="Type Something..." />
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 flex justify-end">
                                    <x-ui.button>Submit Grade</x-ui.button>
                                </td>
                            </tr>
                            </tbody>
                        </form>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endunless

