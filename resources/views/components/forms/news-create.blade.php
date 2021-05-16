@props(['categories', 'sources'])
<form action="{{ route('news.store') }}" method="post" class="center">
    @csrf
    <div class="flex flex-col">
        <div>
            <x-auth-validation-errors :errors="$errors"/>
        </div>
        <label for="category">Категория новости</label>
        <select name="category" >
            <option disabled selected>Выберите категорию</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
        <br />
        <label for="source">Источник новости</label>
        <select name="source" >
            <option disabled selected>Выберите источник</option>
            @foreach($sources as $source)
                <option value="{{ $source->id }}">{{ $source->name }}</option>
            @endforeach
        </select>
        <br />
        <label for="title">Заголовок</label>
        <input type="text" name="title" placeholder="Введите заголовок">
        <br />
        <label for="description">Содержание новости</label>
        <textarea name="description" cols="30" rows="10" placeholder="Введите текст новости"></textarea>
        <div class="self-end">
            <x-buttons.submit>Добавить</x-buttons.submit>
        </div>
    </div>
</form>
