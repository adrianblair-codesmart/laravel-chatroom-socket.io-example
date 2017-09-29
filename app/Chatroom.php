<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Chatroom extends Model
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name'
  ];

  /**
   * A user can have many messages
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function messages()
  {
    return $this->hasMany(Message::class);
  }

  /**
   * A chatroom can have many users.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function users()
  {
    return $this->hasMany(User::class);
  }
}
