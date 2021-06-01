@props(['user', 'order'])
<h3 class="center text-center text-indigo-500 text-xl mt-6"
>{{ $order ? 'Новый заказ' : 'Редактирование' }}</h3>
<form action="{{ $order ? route('orders.put', $order) : route('orders.store') }}" method="post" class="center" id="order-form">
    @csrf
    <div class="flex flex-col">
        <div>
            <x-auth-validation-errors :errors="$errors"/>
        </div>
        <input type="number" class="hidden" name="id" disabled value="{{ $user->id }}">
        <label for="name">Имя пользователя</label>
        <input type="text" name="name" placeholder="Введите Ваше имя" value="{{ $order ? $order->name : $user->name }}">
        <br />
        <label for="phone">Номер телефона</label>
        <input type="text" name="phone" placeholder="Введите Ваше имя" value="{{ $order ? $order->phone : $user->phone}}">
        <br />
        <label for="email">Email</label>
        <input type="email"
               name="email"
               placeholder="Введите адрес электронной почты"
               value="{{ $order ? $order->email : $user->email }}">
        <br />
        <label for="description">Описание</label>
        <textarea
            name="description"
            cols="30"
            rows="10"
            placeholder="Введите описание заказа"
        >{{ $order ? $order->description : '' }}
        </textarea>
        <div class="self-end">
            <x-buttons.submit>{{ $order ? 'Изменить' : 'Добавить' }}</x-buttons.submit>
        </div>
    </div>
</form>
