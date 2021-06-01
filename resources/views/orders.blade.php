<x-app-layout>
    <x-slot name="header">
        <x-text.title-h1>
            {{ __('Заказы') }}
        </x-text.title-h1>
    </x-slot>

    <x-content-body>
        <x-creating-success />
        <x-buttons.button
            href="{{ route('orders.create') }}"
            class="bg-green-300 hover:bg-red-500 mx-1"
        >Добавить заказ</x-buttons.button>
        @forelse($orders as $order)
            <x-orders.index :order="$order"/>
        @empty
            <p class="text-center italic">Заказов пока нет</p>
        @endforelse

    </x-content-body>
</x-app-layout>
