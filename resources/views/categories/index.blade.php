@extends('layouts.master')

@section('title', 'Категории новостей')

@section('content')
    <h1>Категории новостей</h1>
    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('categories.show', compact('category')) }}">{{ $category->title }}</a></li>
        @endforeach
    </ul>
@endsection
