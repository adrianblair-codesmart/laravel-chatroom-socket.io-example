<?php

/*
 * |--------------------------------------------------------------------------
 * | Broadcast Channels
 * |--------------------------------------------------------------------------
 * |
 * | Here you may register all of the event broadcasting channels that your
 * | application supports. The given channel authorization callbacks are
 * | used to check if an authenticated user can listen to the channel.
 * |
 */

use App\Chatroom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.User.{id}', function ($user, $id) {
  // this is saying if the id which is being asked to be broadcast to is the same
  // as the logged in user broadcast to this user.
  return (int) $user->id === (int) $id;
});

Broadcast::channel('chatroom.{id}', function ($user, $id) {
  // firstly check the user is authorised.

  if (Auth::check()) {
    // if the user is authorised then go ahead and check if the user
    // belongs to the chatroom.
    // (you can only be in a chatroom at one time)

    $chatroom = Chatroom::findOrFail($id);

    if ($chatroom->users()
      ->get()
      ->contains($user)) {
      return true;
    }
  }

  return false;
});