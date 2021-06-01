<form action="{{ $comment ? route('about-comment.put', $comment) : route('about-comment.store') }}" method="post" class="center">
    @csrf
    <div class="flex flex-col">
        <div>
            <x-auth-validation-errors :errors="$errors"/>
        </div>
        @if ($comment)
            <input type="number" name="id" class="hidden" value="{{$comment->id}}">
        @endif

        <label for="name">Имя пользователя</label>
        <input
            type="text"
            name="name"
            placeholder="Введите Ваше имя"
            value="{{ $comment->name ?? '' }}"
        >
        <br />
        <label for="description">Комментарий</label>
        <textarea
            name="description"
            cols="30"
            rows="10"
            placeholder="Введите комментарий"

        >{{ $comment['description'] ?? '' }}</textarea>
        <div class="self-end">
            <x-buttons.submit>{{ $comment ? 'Изменить' : 'Добавить' }}</x-buttons.submit>
        </div>
    </div>
</form>
