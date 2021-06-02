<x-app-layout>
    <x-slot name="title">
        {{ __('Laravel - Категории') }}
    </x-slot>

    <x-slot name="header">
        <x-text.title-h1>
            {{ __('Категории') }}
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
            Все категории
        </x-text.title-h2>
        <x-creating-success />
        <div class="flex flex-wrap justify-around">
            @forelse($categories as $category)
                <div class="w-full md:w-1/2 lg:w-1/3 px-3 mt-6">
                    <x-categories.categories-preview :category="$category" />
                </div>
            @empty
                <p class="text-center italic">Категории пока не добавлены</p>
            @endforelse
        </div>
    </x-content-body>
</x-app-layout>
