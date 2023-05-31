


<h1>チャットルーム一覧</h1>

<div class='chat_room_list'>
        <ul>
        @foreach($chat_rooms as $chat_room)
                <li><a href="{{ route('chatroom.show', ['id' => $chat_room->id]) }}">{{ $chat_room->name }}</a></li>
        @endforeach
        </ul>
</div>