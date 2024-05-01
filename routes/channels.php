<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Chat;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

//ظاهرا فقط باید اینجا برای ادمین بررسی انجام بدهم
Broadcast::channel('message-{cookie}', function ($user, $cookie) {
    $chat = Chat::query()->where('cookie' , $cookie)->select('admin_id')->first();

    return (int) $user->id === (int) $chat->admin_id;
});
