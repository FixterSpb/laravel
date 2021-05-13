<form action="{{ route('order.store') }}" method="post" class="center">
    @csrf
    <div class="flex flex-col">
        <div>
            <x-auth-validation-errors :errors="$errors"/>
        </div>
        <label for="name">Имя пользователя</label>
        <input type="text" name="name" placeholder="Введите Ваше имя">
        <br />
        <label for="phone">Номер телефонв</label>
        <input type="text" name="phone" placeholder="Введите Ваше имя">
        <br />
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Введите адрес электронной почты">
        <br />
        <label for="description">Описание</label>
        <textarea name="description" cols="30" rows="10" placeholder="Введите описание заказа"></textarea>
        <div class="self-end">
            <x-buttons.submit>Добавить</x-buttons.submit>
        </div>
    </div>
</form>
