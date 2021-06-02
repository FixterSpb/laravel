<x-app-layout>
    <x-slot name="title">
        {{ __('Laravel - ' . $news->title ) }}
    </x-slot>

    <x-slot name="header">
        <x-text.title-h1>
            {{ __('Новости') }}
        </x-text.title-h1>
        <x-buttons.button class="bg-yellow-500 mx-1" href="{{ route('yandex.news', ['theme' => 'movies']) }}">
            Яндекс Кино
        </x-buttons.button>
        <x-buttons.button class="bg-yellow-500 mx-1" href="{{ route('yandex.news', ['theme' => 'army']) }}">
            Яндекс Армия
        </x-buttons.button>
        <x-buttons.button class="bg-yellow-500 mx-1" href="{{ route('yandex.news', ['theme' => 'sport']) }}">
            Яндекс Спорт
        </x-buttons.button>
    </x-slot>

    <x-content-body>
        <x-text.title-h2>
            {{ $news->title }}
        </x-text.title-h2>
        <x-creating-success />
        <div class="">
            <p>{{ $news->description }}</p>

            <small>Источник: <a class="font-bold" href="{{ $news->source->url }}">{{ $news->source->name }}</a></small>
            <p><small> {{ $news->created_at->format("d.m.Y") }} </small></p>
        </div>
        <div class="flex">
            <x-buttons.button
                class="bg-blue-300 hover:bg-blue-500 mx-1"
                href="{{ route('news.edit', compact('news')) }}"
            >Редактировать</x-buttons.button>
            <x-buttons.button
                href="{{ route('news.destroy', compact('news')) }}"
                class="bg-red-300 hover:bg-red-500 mx-1"
                method="delete"
            >Удалить</x-buttons.button>
        </div>
    </x-content-body>
</x-app-layout>
