@props(['order'])
<div class="py-1 border px-2 rounded-md m-1">
    <div class="flex justify-between content-center">
        <div>
            <p class="align-middle">
                <span class="font-bold">{{ $order->name }}</span>
                - {{ (new DateTime($order->created_at))->format('d.m.Y H:i') }}
            </p>

            <small>{{ $order->phone }}</small>
            <small class="font-bold">{{ $order->email }}</small>
        </div>
        <div class="flex">
            <x-buttons.button
                class="bg-blue-300 hover:bg-blue-500 mx-1"
                href="{{ route('orders.edit', compact('order')) }}"
            >Редактировать</x-buttons.button>
            <x-buttons.button
                href="{{ route('orders.destroy', compact('order')) }}"
                class="bg-red-300 hover:bg-red-500 mx-1"
                method="delete"
            >Удалить</x-buttons.button>
        </div>
    </div>
    <p> {{ $order->description }}</p>
</div>
