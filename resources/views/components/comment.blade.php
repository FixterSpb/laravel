@props(['comment'])

<div class="py-1 border px-2 rounded-md m-1">
    <div class="flex justify-between content-center">
        <p class="align-middle">
            <span class="font-bold">{{ $comment->name }}</span>
            - {{ (new DateTime($comment->created_at))->format('d.m.Y H:i') }}
        </p>
        <div class="flex">
            <x-buttons.button
                class="bg-blue-300 hover:bg-blue-500 mx-1"
                href="{{ route('about-comment.edit', compact('comment')) }}"
            >Редактировать</x-buttons.button>
            <x-buttons.button
                href="{{ route('about-comment.destroy', compact('comment')) }}"
                class="bg-red-300 hover:bg-red-500 mx-1"
                method="delete"
            >Удалить</x-buttons.button>
        </div>
    </div>
    <p> {{ $comment->description }}</p>
</div>
