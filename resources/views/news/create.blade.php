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
        <x-forms.news-create :categories="$categories" :sources="$sources"/>
    </x-content-body>
</x-app-layout>
