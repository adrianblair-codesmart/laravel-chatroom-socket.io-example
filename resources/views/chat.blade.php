<!-- resources/views/chat.blade.php -->

@extends('layouts.app') @section('content')
<app :chatroom="{{ Auth::user()->chatroom()->first() }}" :user="{{ Auth::user() }}"></app>
@endsection
