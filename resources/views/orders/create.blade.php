<x-app-layout>
    <x-slot name="header">
        <x-text.title-h1>
            {{ __('Заказы') }}
        </x-text.title-h1>
    </x-slot>

    <x-content-body>
        <x-forms.order-create :user="$user" :order="$order ?? null"/>
    </x-content-body>
</x-app-layout>
