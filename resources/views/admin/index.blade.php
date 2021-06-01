<x-app-layout>
    <x-slot name="header">
        <x-text.title-h1>
            {{ __('Пользователи') }}
        </x-text.title-h1>
    </x-slot>

    <x-content-body>
        <x-creating-success />

        @foreach($users as $user)
            <div class="block my-2 rounded-md border-2 p-2">
                <p class="font-bold">{{ $user->name }}</p>
                <p>Email: <span class="font-bold">{{ $user->email }}</span></p>
                <p>Phone: <span class="font-bold">{{ $user->phone ?: '-' }}</span></p>
                @if( $user->is_admin )
                    <p>Role: <span class="font-bold">Администратор</span></p>
                        <x-buttons.button
                            :href="route('admin.users.put', compact('user'))"
                            class="bg-red-500">
                            Понизить до смертного
                        </x-buttons.button>
                @else
                    <p>Role: <span class="font-bold">Обычный смертный</span></p>
                        <x-buttons.button
                            :href="route('admin.users.put', compact('user'))"
                            class="bg-green-500">
                            Повысить до Администратора
                        </x-buttons.button>
                @endif

            </div>
        @endforeach


    </x-content-body>
</x-app-layout>
