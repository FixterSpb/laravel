<x-app-layout>
    <x-slot name="title">
        {{ __('Laravel - ' . $news->title ) }}
    </x-slot>

    <x-slot name="header">
        <x-text.title-h1>
            {{ __('Новости') }}
        </x-text.title-h1>
    </x-slot>

    <x-content-body>
        <x-text.title-h2>
            {{ $news->title }}
        </x-text.title-h2>
        <div class="">
            <p>{{ $news->description }}</p>

            <small>Источник: <a class="font-bold" href="{{ $news->source->url }}">{{ $news->source->name }}</a></small>
            <p><small> {{ $news->created_at->format("d.m.Y") }} </small></p>
        </div>
    </x-content-body>
</x-app-layout>
