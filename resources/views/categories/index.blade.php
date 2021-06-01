<x-app-layout>
    <x-slot name="title">
        {{ __('Laravel - Категории') }}
    </x-slot>

    <x-slot name="header">
        <x-text.title-h1>
            {{ __('Категории') }}
        </x-text.title-h1>
    </x-slot>

    <x-content-body>
        <x-text.title-h2>
            Все категории
        </x-text.title-h2>
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
