<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

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

    public function post($id, Request $request)
    {
        $input_comment = $request->input("comment");

        $comment = new Comment();
        $comment->create([
            'chat_room_id' => $id,
            'user_id' => Auth::user()->id,
            'comment' => $input_comment,
            'delete_flg' => 0
        ]);

        return redirect()->route('chatroom.show',['id' => $id]);
    }
}
