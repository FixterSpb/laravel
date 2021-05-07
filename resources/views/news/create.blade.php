<x-app-layout>
    <x-slot name="title">
        {{ __('Laravel - Добавление новости') }}
    </x-slot>
    <x-slot name="header">
        <x-text.title-h1>
            {{ __('Новости') }}
        </x-text.title-h1>
    </x-slot>

    <x-content-body>
        <x-text.title-h2>
            Добавление новости
        </x-text.title-h2>
        <x-news.news-create :categories="$categories" />
{{--        <div class="flex flex-wrap justify-around">--}}
{{--            @forelse($news as $newsItem)--}}
{{--                <div class="w-full md:w-1/2 lg:w-1/3 px-3 mt-6">--}}
{{--                    <x-news.news-preview :news="$newsItem" :categoryIsVisible="true"/>--}}
{{--                </div>--}}
{{--            @empty--}}
{{--                <p class="text-center italic">Новостей пока нет</p>--}}
{{--            @endforelse--}}
{{--        </div>--}}
    </x-content-body>
</x-app-layout>
