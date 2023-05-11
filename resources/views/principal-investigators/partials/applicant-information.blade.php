<div class="sm:col-span-1">
    <dt class="text-sm font-medium text-gray-500">Full name</dt>
    <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->full_name }}</dd>
</div>
<div class="sm:col-span-1">
    <dt class="text-sm font-medium text-gray-500">Application for</dt>
    <dd class="mt-1 text-sm text-gray-900">Backend Developer</dd>
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
    <dt class="text-sm font-medium text-gray-500">Research Title</dt>
    <dd class="mt-1 text-sm text-gray-900">{{ $principalInvestigator->research_title }}</dd>
</div>
<div class="sm:col-span-1">
    <dt class="text-sm font-medium text-gray-500">Faculty</dt>
    <dd class="mt-1 text-sm text-gray-900">{{ \App\Models\Faculty::where('id',$principalInvestigator->faculty_id)->first()->name }}</dd>
</div>
<div class="sm:col-span-1">
    <dt class="text-sm font-medium text-gray-500">Designation</dt>
    <dd class="mt-1 text-sm text-gray-900">{{ \App\Models\Designation::where('id', $principalInvestigator->designation_id)->first()->designation }}</dd>
</div>
<div class="sm:col-span-1">
    <dt class="text-sm font-medium text-gray-500">Status</dt>
    <dd class="mt-1 text-sm text-gray-900">
        <x-ui.badge>{{$principalInvestigator->status}}</x-ui.badge>
    </dd>
</div>
