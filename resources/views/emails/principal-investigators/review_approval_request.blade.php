<x-mail::message>
# Review Application Approval Request

Dear {{  $user->full_name }},

I hope this email finds you well. I am writing to request your approval for a review application that has been submitted. The details of the application are as follows:

    - **Grant Number:** {{ $principalInvestigator->grant_number }}
    - **Application Submitted Date:** {{ $principalInvestigator->created_at }}

Please review the application and provide your feedback and approval. Your prompt attention to this matter would be greatly appreciated.

If you have any questions or need any additional information, please don't hesitate to reach out to me. Thank you in advance for your time and consideration.

Best regards,

<x-mail::button :url="$url">
Login to Approve or Decline
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
