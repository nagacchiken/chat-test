<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatRoom;

class ChatRoomController extends Controller
{
    //
    public function index()
    {
        $chat_room = Chatroom::all();
        return view('chat_room.index', ['chat_rooms' => $chat_room]);
    }

    public function show($id)
    {
        $chat_room = ChatRoom::find($id);
        // $chat_room_comments = ChatRoom::find($id)->comment->user;
        $chat_room_comments = ChatRoom::with('comment.user')->find($id)->comment;

        return view('chat_room.show', 
        [
            'chat_room' => $chat_room,
            'chat_room_comments' => $chat_room_comments
        ]);
    }
}
