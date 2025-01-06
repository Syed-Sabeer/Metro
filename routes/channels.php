<?php

use Illuminate\Support\Facades\Broadcast;

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
Broadcast::channel('chat.{receiver_id}', function ($user, $receiver_id) {
    return $user->id === (int) $receiver_id; // Only allow the receiver to listen
});
Broadcast::channel('chat', function ($user) {
    return $user;
});
// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });
