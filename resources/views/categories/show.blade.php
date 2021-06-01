<x-app-layout>
    <x-slot name="title">
        {{ __('Laravel - ' . $category->title ) }}
    </x-slot>
    <x-slot name="header">
        <x-text.title-h1 class="uppercase">
            {{ __('Категории') }}
        </x-text.title-h1>
    </x-slot>

    <x-content-body>
        <x-text.title-h2 class="mt-4">
            {{ $category->title }}
        </x-text.title-h2>
        <div class="flex flex-wrap justify-around">
            @forelse($news as $newsItem)
                <div class="w-full md:w-1/2 lg:w-1/3 px-3 mt-6">
                    <x-news.news-preview :news="$newsItem"/>
                </div>
            @empty
                <p class="text-center italic">Новостей пока нет</p>
            @endforelse
        </div>
    </x-content-body>
</x-app-layout>
