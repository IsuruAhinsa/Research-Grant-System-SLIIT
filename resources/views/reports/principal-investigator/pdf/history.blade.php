<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<h4>Principal Investigator's Details</h4>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Grant Number</th>
        <th>Faculty</th>
        <th>Designation</th>
    </tr>
    </thead>
    @php $previousEmail = null  @endphp
    @foreach($data as $var)
        @break($var['email'] == $previousEmail)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $var['title'] }}</td>
            <td>{{ $var['first_name'] }}</td>
            <td>{{ $var['last_name'] }}</td>
            <td>{{ $var['email'] }}</td>
            <td>{{ $var['phone'] }}</td>
            <td>{{ $var['grant_number'] ? $var['grant_number'] : '-' }}</td>
            <td>{{ \App\Models\Faculty::find($var['faculty_id'])->name }}</td>
            <td>{{ \App\Models\Designation::find($var['designation_id'])->designation }}</td>
        </tr>
        <tr>
            <th colspan="9">Research Details</th>
        </tr>
        @foreach(\App\Models\PrincipalInvestigator::where('user_id', $var['user_id'])->get() as $research)
            <tr>
                <th>#</th>
                <th colspan="5">Research Title</th>
                <th colspan="2">Registered</th>
                <th>Type</th>
            </tr>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td colspan="5">{{ $research->research_title }}</td>
                <td colspan="2">{{ $research->created_at }}</td>
                <td>{{ $research->type }}</td>
            </tr>
            <tr>
                <th colspan="9">Disbursement Plan Details</th>
            </tr>
            <tr>
                <th colspan="3">Category</th>
                <th>Month</th>
                <th colspan="3">Activity</th>
                <th>Amount</th>
                <th>Created At</th>
            </tr>
            @forelse(\App\Models\DisbursementPlan::where('principal_investigator_id', $research->id)->get() as $dplan)
                <tr>
                    <td colspan="3">{{ $dplan->category }}</td>
                    <td>{{ $dplan->month }}</td>
                    <td colspan="3">{{ $dplan->activity }}</td>
                    <td>LKR {{ number_format($dplan->amount, 2) }}</td>
                    <td>{{ $dplan->created_at }}</td>
                </tr>
            @empty
                <tr><td colspan="9" style="text-align: center; color: #6b7280">No any records.</td></tr>
            @endforelse
        @endforeach
        @php $previousEmail = $var['email']  @endphp
    @endforeach
</table>


<style>
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 6pt;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>
