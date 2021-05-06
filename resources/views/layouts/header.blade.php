<header>
    <ul style="list-style-type: none" class="flex justify-center">
        <li><a class="p-6" href="{{ url('/') }}">Главная</a></li>
        <li><a class="p-6" href="{{ route('categories.index') }}">Категории</a></li>
        <li><a class="p-6" href="{{ url('/about') }}">О проекте</a></li>
        <li><a href="{{ route('auth.index') }}">Войти</a></li>
    </ul>
</header>
