@props(['categories', 'sources', 'news'])
<form action="{{ $news ? route('news.put', $news) : route('news.store') }}" method="post" class="center">
    @csrf
    <div class="flex flex-col">
        <div>
            <x-auth-validation-errors :errors="$errors"/>
        </div>
        <label for="category">Категория новости</label>
        <select name="category" >
            @if (!$news)
                <option disabled selected>Выберите категорию</option>
            @endif
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ ($news && $news->category == $category) ? 'selected' : ''}}>{{ $category->title }}</option>
            @endforeach
        </select>
        <br />
        <label for="source">Источник новости</label>
        <select name="source" >
            @if (!$news)
                <option disabled selected>Выберите источник</option>
            @endif
            @foreach($sources as $source)
                <option value="{{ $source->id }}" {{ ($news && $news->source == $source) ? 'selected' : ''}}>{{ $source->name }}</option>
            @endforeach
        </select>
        <br />
        <label for="title">Заголовок</label>
        <input type="text" name="title" placeholder="Введите заголовок" value="{{ $news ? $news->title : '' }}">
        <br />
        <label for="description">Содержание новости</label>
        <textarea
            name="description"
            cols="30"
            rows="10"
            placeholder="Введите текст новости"
        >{{ $news ? $news->description : ''}}</textarea>
        <div class="self-end">
            <x-buttons.submit>{{ $news ? 'Изменить' : 'Добавить' }}</x-buttons.submit>
        </div>
    </div>
</form>
