@props(['category'])

<div class="bg-green-200 shadow-md rounded-lg m-1">

    <a class="block hover:bg-green-300 p-4 rounded-lg" href="{{ route('categories.show', compact('category')) }}">
        <p class="font-bold">{{ $category->title }}</p>
        <p>{{ $category->created_at->format('d.m.Y') }}</p>
    </a>
</div>
