<?php
namespace App\Events;

use App\Chatroom;
use App\Message;
use App\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  /**
   * User that sent the message
   *
   * @var User
   */
  public $user;

  /**
   * Message details
   *
   * @var Message
   */
  public $message;

  /**
   * Chatroom details
   *
   * @var Chatroom
   */
  public $chatroom;

  /**
   * Create a new event instance.
   *
   * @return void
   */
  public function __construct(User $user, Chatroom $chatroom, Message $message)
  {
    $this->user = $user;
    $this->message = $message;
    $this->chatroom = $chatroom;
  }

  /**
   * Get the channels the event should broadcast on.
   *
   * @return Channel|array
   */
  public function broadcastOn()
  {
    return new PrivateChannel('chatroom.' . $this->chatroom->id);
  }
}
