@props(['comment'])

<div class="py-1 border px-2 rounded-md m-1">
    <p><span class="font-bold">{{ $comment->name }}</span> - {{ (new DateTime($comment->created_at))->format('d.m.Y H:i') }}</p>
    <p> {{ $comment->description }}</p>
</div>
