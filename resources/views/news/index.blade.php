<x-app-layout>
    <x-slot name="title">
        {{ __('Laravel - Новости') }}
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
            Все новости
        </x-text.title-h2>
        <x-creating-success />
        <div class="flex flex-wrap justify-around">
            @forelse($news as $newsItem)
                <div class="w-full md:w-1/2 lg:w-1/3 px-3 mt-6">
                    <x-news.news-preview :news="$newsItem" :categoryIsVisible="true"/>
                </div>
            @empty
                <p class="text-center italic">Новостей пока нет</p>
            @endforelse
        </div>
    </x-content-body>
</x-app-layout>
