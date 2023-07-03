<form action="{{ route('disbursement_plans.store') }}" method="POST">
    @csrf

    <input type="hidden" value="{{ $principalInvestigatorId }}" name="principal_investigator_id">

    <div class="grid grid-cols-6 gap-6">

        <div class="col-span-6 sm:col-span-3">
            <x-ui.label for="month" value="{{ __('Month') }}"/>
            <x-ui.select id="month" name="month" class="mt-1 block w-full">
                <option selected disabled>Select Month</option>
                @foreach(\App\Models\DisbursementPlan::months()->all() as $month)
                    <option value="{{$month['name']}}" {{ old('month') == $month['name'] ? 'selected' : '' }}>{{ $month['name'] }}</option>
                @endforeach
            </x-ui.select>
            <x-ui.input-error for="month" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-ui.label for="category" value="{{ __('Category') }}"/>
            <x-ui.select id="category" name="category" class="mt-1 block w-full">
                <option selected disabled>Select Category</option>
                @foreach(\App\Models\DisbursementPlan::categories()->all() as $category)
                    <option value="{{$category['name']}}" {{ old('category') == $category['name'] ? 'selected' : '' }}>{{ $category['name'] }}</option>
                @endforeach
            </x-ui.select>
            <x-ui.input-error for="category" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-ui.label for="activity" value="{{ __('Activity') }}"/>
            <x-ui.input value="{{ old('activity') }}" placeholder="Enter activity" id="activity" type="text" name="activity"
                        class="mt-1 block w-full"/>
            <x-ui.input-error for="activity" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-ui.label for="amount" value="{{ __('Amount (LKR)') }}"/>
            <x-ui.input value="{{ old('amount') }}" id="amount" placeholder="100000.00" type="text" name="amount"
                        class="mt-1 block w-full"/>
            <x-ui.input-error for="amount" class="mt-2"/>
        </div>

    </div>

    <div class="flex justify-end my-6">
        <x-ui.button>Add</x-ui.button>
    </div>

</form>
