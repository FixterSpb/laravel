<x-app-layout>
    <x-slot name="header">
        <x-text.title-h1>
            {{ __('Главная') }}
        </x-text.title-h1>
    </x-slot>

    <x-content-body>
        <x-text.title-h2>
            Добро пожаловать!
        </x-text.title-h2>
        <x-creating-success />
        <x-forms.order-create />
    </x-content-body>
</x-app-layout>
