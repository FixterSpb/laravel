<form action="{{ route('about-comment.store') }}" method="post" class="center">
    @csrf
    <div class="flex flex-col">
        <label for="name">Имя пользователя</label>
        <input type="text" name="name" placeholder="Введите Ваше имя">
        <br />
        <label for="description">Комментарий</label>
        <textarea name="description" cols="30" rows="10" placeholder="Введите комментарий"></textarea>
        <div class="self-end">
            <x-buttons.submit>Добавить</x-buttons.submit>
        </div>
    </div>
</form>
