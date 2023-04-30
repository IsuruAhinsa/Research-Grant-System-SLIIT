<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginSuccessful
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        try {
            $user = $event->user;
            $user->last_login = Carbon::now();
            $user->last_login_ip = request()->getClientIp();
            $user->user_agent = request()->server('HTTP_USER_AGENT');
            $user->save();
        } catch (\Throwable $throwable) {
            report($throwable);
        }
    }
}
