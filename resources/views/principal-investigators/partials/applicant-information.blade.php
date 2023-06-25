@unlessrole('Dean')

@if(!$principalInvestigator->isReviewer())
    <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">Full name</dt>
        <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->full_name }}</dd>
    </div>

    <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">Email address</dt>
        <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->email }}</dd>
    </div>

    <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">Phone</dt>
        <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->phone }}</dd>
    </div>

    <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">Sliit ID</dt>
        <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->user->index }}</dd>
    </div>

    <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">Faculty Dean's Name</dt>
        <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->dean_name }}</dd>
    </div>

    <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">Faculty Dean's Email</dt>
        <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->dean_email }}</dd>
    </div>
@endif

@endunlessrole

@isset($principalInvestigator->grant_number)
    <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">Grant Number</dt>
        <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->grant_number }}</dd>
    </div>
@endisset

<div class="sm:col-span-1">
    <dt class="text-sm font-medium text-gray-500">Research Title</dt>
    <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->research_title }}</dd>
</div>

<div class="sm:col-span-1">
    <dt class="text-sm font-medium text-gray-500">Faculty</dt>
    <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->faculty->name }}</dd>
</div>

<div class="sm:col-span-1">
    <dt class="text-sm font-medium text-gray-500">Designation</dt>
    <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->designation->designation }}</dd>
</div>

@if($principalInvestigator->is_agreed == TRUE)
    <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">Agreement Date</dt>
        <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->agreed_date }}</dd>
    </div>
@endif
