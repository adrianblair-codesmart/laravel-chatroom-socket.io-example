<?php
use App\Chatroom;
use App\User;
use Illuminate\Database\Seeder;

class ChatroomTableSeeder extends Seeder
{

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $chatroom = Chatroom::create([
      'id' => 1,
      'name' => 'default'
    ]);

    $user = User::create([
      'name' => 'laravel admin',
      'email' => 'admin@laravel.com',
      'password' => bcrypt('password123@')
    ]);

    $user->chatroom()->associate($chatroom);

    $chatroom = Chatroom::create([
      'id' => 2,
      'name' => 'general'
    ]);

    $user->save();
  }
}
