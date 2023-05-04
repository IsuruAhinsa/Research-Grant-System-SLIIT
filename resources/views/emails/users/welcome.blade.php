<x-mail::message>
# Welcome!
Your account is live now.

Hi {{ $user->name }}, we're glad you're here! Following are you account details: <br> <br>
Email: {{ $user->email }} <br>
Password: {{ $password }}

<x-mail::button :url="$url">
    Login as a {{ $user->getRoleNames()->first() }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
