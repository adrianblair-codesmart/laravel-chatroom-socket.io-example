<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'ChatsController@index');
Route::get('chatrooms', 'ChatsController@fetchChatrooms');
Route::post('change-chatroom', 'ChatsController@changeChatroom');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');