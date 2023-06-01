<x-mail::message>
# Welcome!

Welcome to our Research Grant System! We are thrilled to have you on board. This email contains all the information you need to access your new user account. Please keep this email in a safe place for future reference.

Account Details: <br>
Email: {{ $user->email }} <br>
Password: {{ $password }}

To get started, simply visit our website at <a href="{{$url}}">{{$url}}</a> or click on the "Log In" button. Enter your username and password as provided above to access your account.

We encourage you to personalize your account settings and explore the various features available to our users. Should you encounter any issues or have any questions, feel free to reach out to our support team. We're here to assist you.

Please note that your account is subject to our terms and conditions, which can be found on our website. By using our services, you agree to abide by these terms.

Once again, thank you for joining our Research Grant System. We look forward to providing you with an exceptional experience.

<x-mail::button :url="$url">
    Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
