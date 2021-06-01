
<x-app-layout>
    <x-slot name="title">
        {{ __('Laravel - О проекте') }}
    </x-slot>
    <x-slot name="header">
        <x-text.title-h1>
            {{ __('О проекте') }}
        </x-text.title-h1>
    </x-slot>

    <x-content-body>
        <x-text.title-h2>
            Информация о проекте
        </x-text.title-h2>
        <x-creating-success />
        <div>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet iure molestias nulla repudiandae. Ad error nihil sunt. Aliquam atque corporis cum dolorem earum eius enim, error esse est eveniet ex fuga harum ipsum laborum magnam maiores nesciunt numquam, officia optio placeat praesentium provident quae qui quidem reprehenderit ut voluptate! Architecto at atque deleniti ducimus nesciunt nostrum placeat sapiente. Accusantium animi atque delectus illum incidunt labore modi, molestias possimus provident suscipit tempora temporibus totam vel. Accusantium, aliquam dolor dolores excepturi facere minima nemo, nobis qui quis quisquam quo voluptate voluptatum. Assumenda aut dolores eveniet excepturi mollitia nam repellendus saepe sequi voluptates.
            </p>
        </div>
    </x-content-body>

    <x-content-body>
        <x-text.title-h2>
            Добавить комментарий
        </x-text.title-h2>
        <x-forms.about-comment :comment="session()->get('comment') ?? null"/>
    </x-content-body>

    <x-content-body>
        <x-text.title-h2>
            Комментарии
        </x-text.title-h2>
            @forelse($comments as $comment)
                <x-comment :comment="$comment" />
            @empty
                <p class="text-center italic">Комментариев пока нет</p>
            @endforelse
    </x-content-body>
</x-app-layout>
