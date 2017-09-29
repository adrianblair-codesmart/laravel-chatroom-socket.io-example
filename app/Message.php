<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

  /**
   * Fields that are mass assignable
   *
   * @var array
   */
  protected $fillable = [
    'message',
    'user_id',
    'chatroom_id'
  ];

  /**
   * A message belongs to a user
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
   * A message belongs to a chatroom
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function chatroom()
  {
    return $this->belongsTo(Chatroom::class);
  }
}
