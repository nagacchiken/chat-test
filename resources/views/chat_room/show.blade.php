<h1>{{ $chat_room->name }}</h1>

<div class='comments'>
    
    <ul>
    @foreach ($chat_room_comments as $chat_room_comment)
        <li>{{ $chat_room_comment->user->name }} : {{ $chat_room_comment->comment }}</li>
    @endforeach
    </ul>
    <form action="{{ route('chatroom.post',['id' => $chat_room->id]) }}" method="post">
        @csrf
        <textarea name="comment" cols="30" rows="10">

        </textarea>
        <input type="submit" name='submit_button' value="投稿">
    </form>
</div>