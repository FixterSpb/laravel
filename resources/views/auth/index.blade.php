@extends('layouts.empty')

@section('title', 'Авторизация')

@section('content')
    <div class="auth">
        <h3>Авторизация</h3>
        <form action="#">
            <label for="name">Имя пользователя</label>
            <br />
            <input type="text" placeholder="Логин" name="name">
            <br />
            <label for="password">Пароль</label>
            <br />
            <input type="password" name="password" placeholder="Пароль">
            <br />
            <input type="submit" value="Войти">
        </form>
    </div>
@endsection
