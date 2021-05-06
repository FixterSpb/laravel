@extends('layouts.master')

@section('title', 'Создание новости')

@section('content')
    <h1>Добавление новости</h1>
    <form action="#" class="flex flex-column">
        <label for="category">Выберите категорию новости</label>
        <br />
        <select name="category" id="category" name="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
        <br />
        <label for="title">Заголовок</label>
        <br />
        <input type="text" placeholder="Заголовок" name="title" class="border-b">
        <br />
        <label for="description">Содержание</label>
        <br />
        <textarea name='description' placeholder="Введите содержание новости" rows="10"></textarea>
        <input type="submit" value="Добавить">
    </form>
@endsection
