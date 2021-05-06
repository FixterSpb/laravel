@extends('layouts.master')

@section('title', 'Категории новостей')

@section('content')

    <h1>Категория: {{ $category->title }}</h1>
    <ul>

        @foreach($news as $newsItem)
            <li><a href="{{ route('news.show', ['news' => $newsItem]) }}">{{ $newsItem->title }}</a></li>
        @endforeach
    </ul>
@endsection
