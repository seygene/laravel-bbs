<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UsersEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function subscribe(\Illuminate\Events\Dispatcher $events) {
        $events->listen(
            \App\Events\UserCreated::class,
            __CLASS__ . '@onUserCreated'
        );

        $events->listen(
            \App\Events\UserLogin::class,
            __CLASS__ . '@onUserLogin'
        );

        $events->listen(
            \App\Events\PasswordRemindCreated::class,
            __CLASS__ . '@onPasswordRemindCreated'
        );
    }

    public function onUserCreated(\App\Events\UserCreated $event) {
        $user = $event->user;

        \Mail::send('emails.auth.confirm', compact('user'), function ($message) use ($user) {
            $message->from(config('mail.from.address'), config('mail.from.name'));
            $message->to($user->email);
            $message->subject(
                sprintf('[%s] 회원 가입을 확인해주세요.', config('app.name'))
            );
        });

    }

    public function onUserLogin(\App\Events\UserLogin $event) {
        $user = $event->user;
        $user->last_login = \Carbon\Carbon::now();
        return $user->save();
    }

    public function onPasswordRemindCreated(\App\Events\PasswordRemindCreated $event) {
        \Mail::send('emails.passwords.reset', ['token'=> $event->token], function ($message) use ($event) {
            $message->from(config('mail.from.address'), config('mail.from.name'));
            $message->to($event->email);
            $message->subject(
                sprintf('[%s] 비밀번호를 초기화하세요.', config('app.name'))
            );
        });
    }
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
